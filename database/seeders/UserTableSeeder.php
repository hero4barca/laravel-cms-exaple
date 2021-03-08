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
       

       $user = new User;
       $user->name = 'First Company';
       $user->email = 'company1@test.com';
       $user->password = bcrypt('password');
       $user->role_id = Role::where('name', 'company') ->value('id');
       $user->save();
       
    
       $user = new User;
       $user->name = 'First Employee';
       $user->email = 'empoyee1@test.com';
       $user->password = bcrypt('password');
       $user->role_id = Role::where('name', 'employee') ->value('id');
       $user->save();


       $items = [ 

        ['id' => 4, 'name' => 'admin2', 'email' => 'admin2@test.com', 'password' => bcrypt('password'), 'role_id' => 1 ],
        ['id' => 5, 'name' => 'admin3', 'email' => 'admin3@test.com', 'password' => bcrypt('password'), 'role_id' => 1 ],
        ['id' => 6, 'name' => 'admin4', 'email' => 'admin4@test.com', 'password' => bcrypt('password'), 'role_id' => 1 ],
        ['id' => 7, 'name' => 'admin5', 'email' => 'admin5@test.com', 'password' => bcrypt('password'), 'role_id' => 1 ],

        ['id' => 8, 'name' => 'company2', 'email' => 'company2@test.com', 'password' => bcrypt('password'), 'role_id' => 2 ],
        ['id' => 9, 'name' => 'company3', 'email' => 'company3@test.com', 'password' => bcrypt('password'), 'role_id' => 2 ],
        ['id' => 10, 'name' => 'company4', 'email' => 'company4@test.com', 'password' => bcrypt('password'), 'role_id' => 2 ],
        ['id' => 11, 'name' => 'company5', 'email' => 'company5@test.com', 'password' => bcrypt('password'), 'role_id' => 2 ],
        ['id' => 12, 'name' => 'company6', 'email' => 'company6@test.com', 'password' => bcrypt('password'), 'role_id' => 2 ],
        ['id' => 13, 'name' => 'company7', 'email' => 'company7@test.com', 'password' => bcrypt('password'), 'role_id' => 2 ],
        ['id' => 14, 'name' => 'company8', 'email' => 'company8@test.com', 'password' => bcrypt('password'), 'role_id' => 2 ],

        ['id' => 15, 'name' => 'employee2', 'email' => 'employee2@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 16, 'name' => 'employee3', 'email' => 'employee3@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 17, 'name' => 'employee4', 'email' => 'employee4@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 18, 'name' => 'employee5', 'email' => 'employee5@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 19, 'name' => 'employee6', 'email' => 'employee6@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 20, 'name' => 'employee7', 'email' => 'employee7@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 21, 'name' => 'employee8', 'email' => 'employee8@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 22, 'name' => 'employee9', 'email' => 'employee9@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 23, 'name' => 'employee10', 'email' => 'employee10@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 24, 'name' => 'employee11', 'email' => 'employee11@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 25, 'name' => 'employee12', 'email' => 'employee12@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 26, 'name' => 'employee13', 'email' => 'employee13@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 27, 'name' => 'employee14', 'email' => 'employee14@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 28, 'name' => 'employee15', 'email' => 'employee15@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 29, 'name' => 'employee16', 'email' => 'employee16@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 30, 'name' => 'employee17', 'email' => 'employee17@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 31, 'name' => 'employee18', 'email' => 'employee18@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 32, 'name' => 'employee19', 'email' => 'employee19@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 33, 'name' => 'employee20', 'email' => 'employee20@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 34, 'name' => 'employee21', 'email' => 'employee21@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 35, 'name' => 'employee22', 'email' => 'employee22@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 36, 'name' => 'employee23', 'email' => 'employee23@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ],
        ['id' => 37, 'name' => 'employee24', 'email' => 'employee24@test.com', 'password' => bcrypt('password'), 'role_id' => 3 ], 
        
        ];

        foreach ($items as $item) {
            User::updateOrCreate(['id' => $item['id']], $item);
        }

       
    }
}
