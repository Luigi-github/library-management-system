<?php

use App\Http\Controllers\Admin\LibrarianController;
use App\Http\Controllers\API\LibraryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\MemberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;

// Authentication routes
Auth::routes();

// Home page for both Librarian and Member
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

// Home routes
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Book routes
Route::resource('books', BookController::class)->middleware('auth');

// Borrowing routes
Route::prefix('borrowings')->middleware('auth')->group(function () {
    Route::post('/{book}', [BorrowingController::class, 'borrow'])->name('borrowings.borrow');
    Route::post('/{borrowing}/return', [BorrowingController::class, 'return'])->name('borrowings.return');
});

// Librarian dashboard
Route::middleware(['auth', 'is.librarian'])->group(function () {
    Route::get('/librarian/dashboard', [LibrarianController::class, 'dashboard'])->name('librarian.dashboard');
});

// Member dashboard
Route::middleware(['auth', 'is.member'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
});
