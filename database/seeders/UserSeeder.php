<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
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

        $admin = user::create([
            'name' => 'Admin L0vve3',
            'username' => 'adminhehe',
            'email' => 'adminsayang@toko.id',
            'password' => bcrypt('1234'),
            'address' => 'Rancaekek',
            'role' => 'admin',
        ]);
        //$admin->assignRole('admin');
        
    }
}
