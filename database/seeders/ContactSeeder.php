<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Contact::create([
         'phone' => 'phone number',
         'email' => 'email',
         'facebook' => 'facebook link',
         'twitter' => 'twitter link',
         'google' => 'google link',
         'linkedin' => 'linkedin link',
           
       ]);
    }
}