<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'mcampos',
            'email' => 'mcampos@infocam.com.ar',
            'password' => bcrypt('123456789'),
            'rol' => 'system'
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@infocam.com.ar',
            'password' => bcrypt('123456789'),
            'rol' => 'admin'
        ]);
        User::create([
            'name' => 'usuario',
            'email' => 'usuario@infocam.com.ar',
            'password' => bcrypt('123456789'),
            'rol' => 'user'
        ]);
        User::create([
            'name' => 'huesped',
            'email' => 'huesped@infocam.com.ar',
            'password' => bcrypt('123456789')
        ]);
    }
}
