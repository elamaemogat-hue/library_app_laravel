<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library App')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f7fa; color: #333; line-height: 1.6; }
        .container { max-width: 960px; margin: 0 auto; padding: 0 20px; }
        nav { background: #2c3e50; padding: 15px 0; margin-bottom: 30px; }
        nav .container { display: flex; justify-content: space-between; align-items: center; }
        nav a { color: #ecf0f1; text-decoration: none; font-size: 16px; }
        nav .brand { font-size: 22px; font-weight: bold; letter-spacing: 1px; }
        nav .nav-links a { margin-left: 20px; padding: 8px 16px; border-radius: 4px; transition: background 0.2s; }
        nav .nav-links a:hover { background: #34495e; }
        h1, h2, h3 { color: #2c3e50; margin-bottom: 15px; }
        .alert { padding: 12px 20px; border-radius: 6px; margin-bottom: 20px; font-weight: 500; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 25px; margin-bottom: 20px; }
        .btn { display: inline-block; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600; cursor: pointer; border: none; transition: background 0.2s, transform 0.1s; }
        .btn:active { transform: scale(0.98); }
        .btn-primary { background: #3498db; color: #fff; }
        .btn-primary:hover { background: #2980b9; }
        .btn-success { background: #27ae60; color: #fff; }
        .btn-success:hover { background: #219a52; }
        .btn-warning { background: #f39c12; color: #fff; }
        .btn-warning:hover { background: #e08e0b; }
        .btn-danger { background: #e74c3c; color: #fff; }
        .btn-danger:hover { background: #c0392b; }
        .btn-sm { padding: 6px 14px; font-size: 13px; }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: 600; color: #2c3e50; }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%; padding: 10px 14px; border: 2px solid #ddd; border-radius: 6px;
            font-size: 15px; transition: border-color 0.2s;
        }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: #3498db; }
        .form-group textarea { resize: vertical; min-height: 80px; }
        .form-group .error { color: #e74c3c; font-size: 13px; margin-top: 4px; }
        table { width: 100%; border-collapse: collapse; }
        table th, table td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; }
        table th { background: #f8f9fa; font-weight: 600; color: #2c3e50; }
        table tr:hover { background: #f8f9fa; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 600; }
        .badge-available { background: #d4edda; color: #155724; }
        .badge-borrowed { background: #f8d7da; color: #721c24; }
        .search-bar { display: flex; gap: 10px; margin-bottom: 25px; }
        .search-bar input { flex: 1; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .empty-state { text-align: center; padding: 40px; color: #999; }
        .empty-state p { font-size: 18px; }
    </style>
</head>
<body>
    <nav>
        <div class="container">
            <a href="{{ route('books.index') }}" class="brand">📚 Library App</a>
            <div class="nav-links">
                <a href="{{ route('books.index') }}">All Books</a>
                <a href="{{ route('books.create') }}">Add Book</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
