<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //create first user with email admin@admin.com and password “password”
         //create method
         $user = new User();
         $user ->name = 'admin';
         $user -> email = 'admin@admin.com';
         $user ->password = bcrypt('password');//perform encryption on password
         $user -> save();
    }
}
