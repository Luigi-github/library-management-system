<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Borrowing;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'genre' => $this->faker->word,
            'isbn' => $this->faker->unique()->isbn10,
            'total_copies' => $this->faker->numberBetween(1, 10),
            //'available_copies' => $this->faker->numberBetween(0, 5),
            //'borrowings' => Borrowing::factory(5),
        ];
    }
}

