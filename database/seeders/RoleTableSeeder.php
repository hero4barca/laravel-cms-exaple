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

        $items = [            
            ['id' => 1, 'name' => 'admin', 'description' => 'An admin user'],
            ['id' => 2, 'name' => 'company', 'description' => 'A company user'],
            ['id' => 2, 'name' => 'employee', 'description' => 'An employee user'],
        ];
    
        foreach ($items as $item) {
            Role::updateOrCreate(['id' => $item['id']], $item);
        }

    }
}
