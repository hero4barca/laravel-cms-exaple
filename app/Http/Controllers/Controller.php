<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store_user(Request $request)
    {
        
        $validator = Validator::make($request->all(), 
        [ 
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password'=> 'required',
            'role_id' => 'required|exists:App\Models\Role,id',   
          
       ]);  
       
    if ($validator->fails()) {          
          return response()->json(['error'=>$validator->errors()], 401);                        
       }  


        

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;

        $user->save();

        return new UserResource($user);

    }

    public function update_user(Request $request, User $user){
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required',//only the user's name can be modified by update
        
        ]);

        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  

        $user->update($request->only(['name']));

        return new UserResource($user);
    }
}
