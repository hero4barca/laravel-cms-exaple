<?php
#use Illuminate\Support\Str; 

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyResource;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return CompanyResource::collection(Company::latest()->paginate(5));
    }

    /** retures a list of all companies */
    public function all()
    {
        return view('index', [
            'companies' => Company::latest()->paginate(5)
        ]);
    }

    public function getSingle(Company $company)
    {   
        
        return view('company', compact('company'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*$this->validate($request, [           

            'url' => 'required',                      
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);*/

        $validator = Validator::make($request->all(), 
              [ 
                'url' => 'required',                      
                'logo' => 'required|mimes:jpeg,png,jpg,gif,svg',
             ]);  
             
        if ($validator->fails()) {          
                return response()->json(['error'=>$validator->errors()], 401);                        
             }  

        $company = new Company();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            
            //filename = companyname_uploadtime.extension
            $time_str = (string)time();
            $new_filename = $request->name.'_'.$time_str;            
            $new_filename = str_slug($new_filename).'.'.$logo->getClientOriginalExtension();


            $destinationPath = public_path('/uploads/companies');
            $logoPath = $destinationPath . "/" . $new_filename;
            $logo->move($destinationPath, $new_filename);

            $company->logo = $new_filename; //or logo path??  
        }

        $storeUserResponse = $this->store_user($request);

        if(isset($storeUserResponse->id))  // if the response is a serialized user object
        {

            $company->user_id = $storeUserResponse->id;
            $company->url = $request->url;
            $company->save();

            return new CompanyResource($company);
        }
        else // return the response from storeUser to the caller; error mgs for user fields
            {
                return $storeUserResponse;
            }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $validator = Validator::make($request->all(), 
         [
            'url' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required',
                       
        ]);

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  

        $companyUser = User::find($company->user_id);
        $updateUserResponse = $this->update_user($request, $companyUser);
         
        if(isset($updateUserResponse->id))  // if the response is a serialized user object
        {

            $company->update($request->only(['url', 'logo']));

            return new CompanyResource($company);
        }
        else // return the response from update_user to the caller; error mgs for user fields
            {
                return $updateUserResponse;
            }
        
       
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //TODO: changethis to delete the corresponding user object, use on delete cascade
        $companyUser = User::find($company->user_id);
        $companyUser->delete();

        return response()->json(null, 204);
    }
}
