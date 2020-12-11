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
        User::create([
            'title' => 'Ông',
            'name' => 'Admin',
            'email' => 'admin@emr.com',
            'role' => 'admin',
            'password' => bcrypt('12345678')
        ]);
    }
}
