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
        $admin = User::create([
            'name' => 'lead A',
            'email' => 'leada@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin = User::create([
            'name' => 'lead B',
            'email' => 'leadb@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin = User::create([
            'name' => 'lead C',
            'email' => 'leadc@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('lead');

        $user = User::create([
            'name' => 'Staf A',
            'email' => 'usera@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user = User::create([
            'name' => 'Staf B',
            'email' => 'userb@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user = User::create([
            'name' => 'Staf C',
            'email' => 'userc@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('staf');
    }
}
