<?php

use \App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'id' => 1,
        	'name' => 'Admin Sistem',
        	'role' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin'),
        ]);
        User::create([
        	'id' => 2,
        	'name' => 'Gilang Praditto',
        	'role' => 'peternak',
        	'email' => 'gilang@gmail.com',
        	'password' => bcrypt('gilang'),
        ]);
    }
}
