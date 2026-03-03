@extends('layouts.app')

@section('title', 'Borrow: ' . $book->title)

@section('content')
    <div class="page-header">
        <h1>Borrow: {{ $book->title }}</h1>
        <a href="{{ route('books.show', $book) }}" class="btn btn-warning">← Back to Book</a>
    </div>

    <div class="card">
        <p style="margin-bottom: 20px; color: #666;">
            You are borrowing <strong>{{ $book->title }}</strong> by <strong>{{ $book->author }}</strong>.
        </p>

        <form action="{{ route('borrows.store', $book) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="borrower_name">Your Name *</label>
                <input type="text" id="borrower_name" name="borrower_name" value="{{ old('borrower_name') }}" required>
                @error('borrower_name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="borrower_email">Your Email</label>
                <input type="email" id="borrower_email" name="borrower_email" value="{{ old('borrower_email') }}">
                @error('borrower_email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="due_date">Return By (Due Date) *</label>
                <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}" required
                       min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                @error('due_date') <div class="error">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-success">Confirm Borrow</button>
        </form>
    </div>
@endsection
