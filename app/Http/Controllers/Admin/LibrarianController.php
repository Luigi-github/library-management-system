<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;

class LibrarianController extends Controller
{
    public function dashboard()
    {
        $totalBooks = Book::count();
        $totalBorrowedBooks = Borrowing::whereNotNull('borrowed_at')->count();
        $booksDueToday = Borrowing::whereDate('due_at', today())->count();

        // List of members with overdue books
        $membersWithOverdueBooks = User::whereHas('borrowings', function ($query) {
            $query->whereNotNull('borrowed_at')
                ->whereNull('returned_at')
                ->whereDate('due_at', '>', today());
        })->withCount(['overdueBorrowings' => function ($query) {
            $query->whereDate('due_at', '>', today());
        }])->get();

        return view('librarian.dashboard', compact('totalBooks', 'totalBorrowedBooks', 'booksDueToday', 'membersWithOverdueBooks'));
    }
}

