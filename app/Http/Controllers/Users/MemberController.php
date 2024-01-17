<?php

// app/Http/Controllers/MemberController.php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\User;

class MemberController extends Controller
{
    public function dashboard()
    {
        // Retrieve the authenticated user's borrowings and overdue books
        $userBorrowings = auth()->user()->borrowings()->whereNull('returned_at')->get();
        $overdueBooks = auth()->user()->overdueBooks();

        return view('member.dashboard', compact('userBorrowings', 'overdueBooks'));
    }
}

