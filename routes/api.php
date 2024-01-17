<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\API\LibraryController;

Route::get('/books', [LibraryController::class, 'indexBooks']);
Route::get('/books/{id}', [LibraryController::class, 'showBook']);
Route::post('/books', [LibraryController::class, 'storeBook']);
Route::put('/books/{id}', [LibraryController::class, 'updateBook']);
Route::delete('/books/{id}', [LibraryController::class, 'destroyBook']);

Route::get('/borrowings', [LibraryController::class, 'indexBorrowings']);
Route::get('/borrowings/{id}', [LibraryController::class, 'showBorrowing']);
Route::post('/borrowings', [LibraryController::class, 'storeBorrowing']);
Route::put('/borrowings/{id}', [LibraryController::class, 'updateBorrowing']);
Route::delete('/borrowings/{id}', [LibraryController::class, 'destroyBorrowing']);

