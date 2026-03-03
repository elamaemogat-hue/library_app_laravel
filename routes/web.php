<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use Illuminate\Support\Facades\Route;

// Redirect home to books list
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Book routes
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Borrow routes
Route::get('/books/{book}/borrow', [BorrowController::class, 'create'])->name('borrows.create');
Route::post('/books/{book}/borrow', [BorrowController::class, 'store'])->name('borrows.store');
Route::patch('/books/{book}/borrows/{borrow}/return', [BorrowController::class, 'returnBook'])->name('borrows.return');
