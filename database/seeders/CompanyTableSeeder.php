<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\User;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $company = new Company;
        $company -> user_id = User::where('name', 'First Company') ->value('id');
        $company ->url = "www.first-company.com";
        $company-> save();




        $items = [            
            ['id' => 2, 'user_id' => 6, 'url' => 'company2.com'],
            ['id' => 3, 'user_id' => 7, 'url' => 'company3.com'],
            ['id' => 4, 'user_id' => 8, 'url' => 'company4.com'],
            ['id' => 5, 'user_id' => 9, 'url' => 'company5.com'],
            ['id' => 6, 'user_id' => 10, 'url' => 'company6.com'],
            ['id' => 7, 'user_id' => 11, 'url' => 'company7.com'],
            ['id' => 8, 'user_id' => 12, 'url' => 'company8.com'],
        ];
    
        foreach ($items as $item) {
            Company::updateOrCreate(['id' => $item['id']], $item);
        }
    }

    
}
