@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
    <div class="page-header">
        <h1>Add New Book</h1>
        <a href="{{ route('books.index') }}" class="btn btn-warning">← Back to Books</a>
    </div>

    <div class="card">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="author">Author *</label>
                <input type="text" id="author" name="author" value="{{ old('author') }}" required>
                @error('author') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}">
                @error('isbn') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description') <div class="error">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
@endsection
