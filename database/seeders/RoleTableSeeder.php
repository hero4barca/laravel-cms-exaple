<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin_user = new Role;
        $role_admin_user->name = 'admin';
        $role_admin_user->description = 'An admin user';
        $role_admin_user->save();

        $role_admin_user = new Role;
        $role_admin_user->name = 'company';
        $role_admin_user->description = 'A company user';
        $role_admin_user->save();

        $role_admin_user = new Role;
        $role_admin_user->name = 'employee';
        $role_admin_user->description = 'An employee user';
        $role_admin_user->save();
    }
}
