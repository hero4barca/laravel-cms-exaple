<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $employee = new Employee();
        $employee -> user_id = User::where('name', 'First Employee') ->value('id');
        
        //retrieve company data
        $companyUser = User::where('name', 'First Company')->first();
        $company = $companyUser->company;
        
        $employee->company_id = $company->id; 
        $employee-> save();
        
    }
}
