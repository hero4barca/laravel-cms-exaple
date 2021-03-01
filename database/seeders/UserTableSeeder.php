<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user = new User;
       $user->name = 'First User';
       $user->email = 'test@test.com';
       $user->password = bcrypt('password');
       $user->role_id = Role::where('name', 'admin') ->value('id');
       $user->save();
       //$user->roles()->attach(Role::where('name', 'admin') -> first());

       $user = new User;
       $user->name = 'First Company';
       $user->email = 'company1@test.com';
       $user->password = bcrypt('password');
       $user->role_id = Role::where('name', 'company') ->value('id');
       $user->save();
       //$user->roles()->attach(Role::where('name', 'company') -> get());
    
       $user = new User;
       $user->name = 'First Employee';
       $user->email = 'empoyee1@test.com';
       $user->password = bcrypt('password');
       $user->role_id = Role::where('name', 'employee') ->value('id');
       $user->save();
       //$user->roles()->attach(Role::where('name', 'employee') -> first());
    }
}
