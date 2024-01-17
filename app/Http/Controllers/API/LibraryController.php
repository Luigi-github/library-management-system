<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;

class LibraryController extends Controller
{
    // Get all books
    public function indexBooks()
    {
        $books = Book::all();
        return response()->json($books);
    }

    // Get a specific book by ID
    public function showBook($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    // Create a new book
    public function storeBook(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'isbn' => 'required|unique:books',
            'total_copies' => 'required|integer|min:1',
        ]);

        $book = Book::create($validatedData);
        return response()->json($book, 201);
    }

    // Update a book by ID
    public function updateBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'total_copies' => 'required|integer|min:1',
        ]);

        $book->update($validatedData);
        return response()->json($book, 200);
    }

    // Delete a book by ID
    public function destroyBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }

    // Get all borrowings
    public function indexBorrowings()
    {
        $borrowings = Borrowing::all();
        return response()->json($borrowings);
    }

    // Get a specific borrowing by ID
    public function showBorrowing($id)
    {
        $borrowing = Borrowing::find($id);
        return response()->json($borrowing);
    }

    // Create a new borrowing
    public function storeBorrowing(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date',
            'returned_at' => 'nullable|date',
        ]);

        $borrowing = Borrowing::create($validatedData);
        return response()->json($borrowing, 201);
    }

    // Update a borrowing by ID
    public function updateBorrowing(Request $request, $id)
    {
        $borrowing = Borrowing::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date',
            'returned_at' => 'nullable|date',
        ]);

        $borrowing->update($validatedData);
        return response()->json($borrowing, 200);
    }

    // Delete a borrowing by ID
    public function destroyBorrowing($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();
        return response()->json(null, 204);
    }
}
