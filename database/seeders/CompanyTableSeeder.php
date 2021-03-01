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
    }
}
