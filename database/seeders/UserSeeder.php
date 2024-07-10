<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carolina',
            'email' => 'carolina@sena.edu.co',
            'password' => bcrypt('a1b2c3d4')
        ]);

        User::create([
            'name' => 'Alberto',
            'email' => 'alberto@sena.edu.co',
            'password' => bcrypt('a1b2c3d4')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Jose',
            'email' => 'jose@sena.edu.co',
            'password' => bcrypt('a1b2c3d4')
        ])->assignRole('SuperAdmin');

        User::factory(9)->create();
    }
}