<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Show the form to borrow a book.
     */
    public function create(Book $book)
    {
        if (!$book->available) {
            return redirect()->route('books.show', $book)
                ->with('error', 'This book is currently borrowed.');
        }

        return view('borrows.create', compact('book'));
    }

    /**
     * Store a new borrow record and mark book as unavailable.
     */
    public function store(Request $request, Book $book)
    {
        if (!$book->available) {
            return redirect()->route('books.show', $book)
                ->with('error', 'This book is currently borrowed.');
        }

        $validated = $request->validate([
            'borrower_name'  => 'required|string|max:255',
            'borrower_email' => 'nullable|email|max:255',
            'due_date'       => 'required|date|after:today',
        ]);

        $book->borrows()->create([
            'borrower_name'  => $validated['borrower_name'],
            'borrower_email' => $validated['borrower_email'] ?? null,
            'borrowed_at'    => now(),
            'due_date'       => $validated['due_date'],
        ]);

        $book->update(['available' => false]);

        return redirect()->route('books.show', $book)
            ->with('success', 'Book borrowed successfully!');
    }

    /**
     * Return a borrowed book.
     */
    public function returnBook(Book $book, Borrow $borrow)
    {
        $borrow->update(['returned_at' => now()]);
        $book->update(['available' => true]);

        return redirect()->route('books.show', $book)
            ->with('success', 'Book returned successfully!');
    }
}
