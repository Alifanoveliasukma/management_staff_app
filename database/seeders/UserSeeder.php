<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminA = User::create([
            'name' => 'lead A',
            'email' => 'leada@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $adminB = User::create([
            'name' => 'lead B',
            'email' => 'leadb@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $adminC = User::create([
            'name' => 'lead C',
            'email' => 'leadc@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $adminA->assignRole('lead');
        $adminB->assignRole('lead');
        $adminC->assignRole('lead');


        $userA = User::create([
            'name' => 'Staf A',
            'email' => 'usera@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $userB = User::create([
            'name' => 'Staf B',
            'email' => 'userb@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $userC = User::create([
            'name' => 'Staf C',
            'email' => 'userc@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $userA->assignRole('staf');
        $userB->assignRole('staf');
        $userC->assignRole('staf');
    }
}
