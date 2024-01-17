<?php

// database/factories/BorrowingFactory.php

namespace Database\Factories;

use App\Models\Borrowing;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowingFactory extends Factory
{
    protected $model = Borrowing::class;

    public function definition()
    {
        $borrowedAt = $this->faker->dateTimeBetween('-30 days', 'yesterday');
        $dueAt = $this->faker->dateTimeBetween('now', '+30 days');


        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'borrowed_at' => $borrowedAt,
            'due_at' => $dueAt,
            'returned_at' => $this->faker->boolean(80) ? $this->faker->dateTimeBetween($dueAt, '+30 days') : null,
        ];
    }
}

