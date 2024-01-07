<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Lead A',
                'email' => 'leada@gmail.com',
                'role' => 'lead',
                'password' =>bcrypt('123456')
            ],
            [
                'name' => 'Lead B',
                'email' => 'leadb@gmail.com',
                'role' => 'lead',
                'password' =>bcrypt('123456')
            ],
            [
                'name' => 'Lead C',
                'email' => 'leadc@gmail.com',
                'role' => 'lead',
                'password' =>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
