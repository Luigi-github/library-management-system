<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrowing;

class BorrowingSeeder extends Seeder
{
    public function run()
    {
        Borrowing::factory(5)->create();
    }
}

