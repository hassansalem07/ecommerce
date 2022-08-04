<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $super_admin = Admin::create([
           'name' => 'hassan',
           'email' => 'hassan@yahoo.com',
           'password' => Hash::make(12345678),
           
       ]);

       $super_admin->assignRole('super_admin');
    }
}