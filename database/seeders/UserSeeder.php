<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
            // Librarian user
            $email1 = 'librarian@example.com';

                User::create([
                    'name' => 'Librarian User',
                    'email' => $email1,
                    'password' => Hash::make('password'),
                    'role' => 'librarian',
                ]);


            // Member user
            $email2 = 'member@example.com';

                User::create([
                    'name' => 'Member User',
                    'email' => $email2,
                    'password' => Hash::make('password'),
                    'role' => 'member',
                ]);

    }
}

