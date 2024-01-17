<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    public function borrow(Book $book)
    {
        // Check if the book is available
        if ($book->available_copies <= 0) {
            return redirect()->back()->with('error', 'Book not available for borrowing');
        }

        // Check if the user has already borrowed this book
        $userBorrowing = auth()->user()->borrowings()->where('book_id', $book->id)->first();
        if ($userBorrowing) {
            return redirect()->back()->with('error', 'You have already borrowed this book');
        }

        // Create a new borrowing record
        Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_at' => now()->addDays(14), // Due in 14 days
        ]);

        // Decrement the available_copies of the book
        $book->decrement('available_copies');

        return redirect()->back()->with('success', 'Book borrowed successfully');
    }

    public function return(Borrowing $borrowing)
    {
        // Check if the borrowing record belongs to the authenticated user
        if ($borrowing->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to return this book');
        }

        // Mark the book as returned
        $borrowing->update([
            'returned_at' => now(),
        ]);

        // Increment the available_copies of the book
        $borrowing->book->increment('available_copies');

        return redirect()->back()->with('success', 'Book returned successfully');
    }
}
