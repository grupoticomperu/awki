<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name'=>'admin1',
            'email'=>'admin@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name'=>'admin2',
            'email'=>'admin2@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');


        User::create([
            'name'=>'admin3',
            'email'=>'admin3@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');


      /*  User::factory(99)->create();*/

    }
}
