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


        $items = [  
                      
            ['id' => 2, 'user_id' => 13, 'company_id' => 2],
            ['id' => 3, 'user_id' => 14, 'company_id' => 2],
            ['id' => 4, 'user_id' => 15, 'company_id' => 2],

            ['id' => 5, 'user_id' => 16, 'company_id' => 3],
            ['id' => 6, 'user_id' => 17, 'company_id' => 3],
            ['id' => 7, 'user_id' => 18, 'company_id' => 3],

            ['id' => 8, 'user_id' => 19, 'company_id' => 4],
            ['id' => 9, 'user_id' => 20, 'company_id' => 4],
            ['id' => 10, 'user_id' => 21, 'company_id' => 4],

            ['id' => 11, 'user_id' => 22, 'company_id' => 5],
            ['id' => 12, 'user_id' => 23, 'company_id' => 5],
            ['id' => 13, 'user_id' => 24, 'company_id' => 5],

            ['id' => 14, 'user_id' => 25, 'company_id' => 6],
            ['id' => 15, 'user_id' => 26, 'company_id' => 6],
            ['id' => 16, 'user_id' => 27, 'company_id' => 6],

            ['id' => 17, 'user_id' => 28, 'company_id' => 7],
            ['id' => 18, 'user_id' => 29, 'company_id' => 7],
            ['id' => 19, 'user_id' => 30, 'company_id' => 7],


            ['id' => 20, 'user_id' => 31, 'company_id' => 8],
            ['id' => 21, 'user_id' => 32, 'company_id' => 8],
            ['id' => 22, 'user_id' => 33, 'company_id' => 8],
            ['id' => 23, 'user_id' => 34, 'company_id' => 8],
            ['id' => 24, 'user_id' => 35, 'company_id' => 8],
            
        ];
    
        foreach ($items as $item) {
            Employee::updateOrCreate(['id' => $item['id']], $item);
        }

        
    }
}
