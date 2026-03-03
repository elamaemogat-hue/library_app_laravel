@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="page-header">
        <h1>{{ $book->title }}</h1>
        <a href="{{ route('books.index') }}" class="btn btn-warning">← Back to Books</a>
    </div>

    {{-- Book Details --}}
    <div class="card">
        <h2>Book Details</h2>
        <table>
            <tr><th style="width:150px">Title</th><td>{{ $book->title }}</td></tr>
            <tr><th>Author</th><td>{{ $book->author }}</td></tr>
            <tr><th>ISBN</th><td>{{ $book->isbn ?? '—' }}</td></tr>
            <tr><th>Description</th><td>{{ $book->description ?? 'No description provided.' }}</td></tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($book->available)
                        <span class="badge badge-available">Available</span>
                    @else
                        <span class="badge badge-borrowed">Borrowed</span>
                    @endif
                </td>
            </tr>
            <tr><th>Added</th><td>{{ $book->created_at->format('M d, Y') }}</td></tr>
        </table>

        @if($book->available)
            <div style="margin-top: 20px;">
                <a href="{{ route('borrows.create', $book) }}" class="btn btn-success">Borrow This Book</a>
            </div>
        @endif
    </div>

    {{-- Borrow History --}}
    <div class="card">
        <h2>Borrow History</h2>

        @if($book->borrows->isEmpty())
            <p style="color:#999; padding: 10px 0;">No borrow history for this book.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Borrower</th>
                        <th>Email</th>
                        <th>Borrowed</th>
                        <th>Due Date</th>
                        <th>Returned</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book->borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->borrower_name }}</td>
                            <td>{{ $borrow->borrower_email ?? '—' }}</td>
                            <td>{{ $borrow->borrowed_at->format('M d, Y') }}</td>
                            <td>{{ $borrow->due_date->format('M d, Y') }}</td>
                            <td>
                                @if($borrow->returned_at)
                                    {{ $borrow->returned_at->format('M d, Y') }}
                                @else
                                    <span class="badge badge-borrowed">Not returned</span>
                                @endif
                            </td>
                            <td>
                                @if(!$borrow->returned_at)
                                    <form action="{{ route('borrows.return', [$book, $borrow]) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm">Return</button>
                                    </form>
                                @else
                                    <span style="color:#999">—</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
