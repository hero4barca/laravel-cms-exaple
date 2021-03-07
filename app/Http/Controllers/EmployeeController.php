<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use Validator;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return EmployeeResource::collection(Employee::latest()->paginate(5));
    }

    /** retures a list of all companies */
    public function all()
    {
        return view('all-employees', [
            'employees' => Employee::latest()->paginate(5)
        ]);
    }

    public function companyEmployees(Company $company)
    {
        return view('company-employees', [
            'employees' => $company->employees()->paginate(5)
        ]);

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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $validator = Validator::make($request->all(), 
              [ 
                'company' => 'required|exists:App\Models\Company,id',
                'name' => 'required',
                'email' => 'email|required|unique:users,email',
                'password'=> 'required',
             ]);  
             
        if ($validator->fails()) {          
                return response()->json(['error'=>$validator->errors()], 401);                        
             }  

        //get employee role id from role model
        $employee_role_id = Role::where('name', 'employee') ->value('id');
        $request->request->set('role_id', $employee_role_id); 

        $storeUserResponse  = $this->store_user($request);

        if(isset($storeUserResponse->id))  // if the response is a serialized user object
        {
           

            $employee = new Employee();

            $employee->user_id = $storeUserResponse->id;
            $employee->company_id = $request->company;
            $employee->save();

            return new EmployeeResource($employee);
        }
        else // return the response from storeUser to the caller; error mgs for user fields
            {
                return $storeUserResponse;
            }

    }

    public function get_by_user(Request $request, User $user )
    {
        $employee = Employee::where('user_id', $user->id)->first();

        return new EmployeeResource($employee);
    }

    /**
     * Set an employees company
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function set_company(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(), 
        [ 
          'company' => 'required|exists:App\Models\Company,id',
        ]);  
       
        if ($validator->fails()) {          
          return response()->json(['error'=>$validator->errors()], 401);                        
        }  

        
        $employee->update(['company_id' => $request->company]);

        return new EmployeeResource($employee);

    }

    /**
     * Display the specified resource. API show
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show( Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function companyEmployee( Employee $employee)
    {
        return view('single-employee', compact('employee'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
    
    $validator = Validator::make($request->all(),
        [ 
            'company' => 'sometimes|nullable|exists:App\Models\Company,id',
            'name' => 'required',
            'email' => ['required','max:255', 'email', Rule::unique('users')->ignore($employee->user_id),], 
            
         ]);  
         
    if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
        
        
        //update the corresponding user object
         $employeeUser = User::find($employee->user_id);
        $updateUserResponse = $this->update_user($request, $employeeUser);
         
        
        if(isset($updateUserResponse->id))  // if the response is a serialized user object
        {
            if($request->company)
            {
            
                $employee->update(['company_id' => $request->company]);  
            }
            
            return new EmployeeResource($employee);
        }
        else // return the response from update_user to the caller; error mgs for update controller method
            {
                return $updateUserResponse;
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //get the user object and delete; on foreign key cascade
        $employeeUser = User::find($employee->user_id);
        $employeeUser->delete();

        return response()->json(null, 204);
    }
}