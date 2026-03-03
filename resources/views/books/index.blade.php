@extends('layouts.app')

@section('title', 'All Books')

@section('content')
    <div class="page-header">
        <h1>All Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Add New Book</a>
    </div>

    {{-- Search / Lookup --}}
    <form action="{{ route('books.index') }}" method="GET" class="search-bar">
        <input type="text" name="search" placeholder="Search by title, author, or ISBN..."
               value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
        @if(request('search'))
            <a href="{{ route('books.index') }}" class="btn btn-warning">Clear</a>
        @endif
    </form>

    @if($books->isEmpty())
        <div class="card empty-state">
            <p>No books found.</p>
            @if(request('search'))
                <p style="margin-top:10px"><a href="{{ route('books.index') }}">View all books</a></p>
            @else
                <p style="margin-top:10px"><a href="{{ route('books.create') }}">Add the first book!</a></p>
            @endif
        </div>
    @else
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><strong>{{ $book->title }}</strong></td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->isbn ?? '—' }}</td>
                            <td>
                                @if($book->available)
                                    <span class="badge badge-available">Available</span>
                                @else
                                    <span class="badge badge-borrowed">Borrowed</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('books.show', $book) }}" class="btn btn-primary btn-sm">View</a>
                                @if($book->available)
                                    <a href="{{ route('borrows.create', $book) }}" class="btn btn-success btn-sm">Borrow</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
