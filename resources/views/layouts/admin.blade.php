<!DOCTYPE html>
<html>
<head>
    <title>Admin Portal</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
            flex-grow: 1;
        }
        .logout-button {
        width: 50%;
        background: linear-gradient(to right, #ff416c, #ff4b2b);
        border: none;
        color: white;
        padding: 5px 4px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        margin-top: 20px;
        transition: background 0.3s, transform 0.2s;
        }

        .logout-button:hover {
            background: linear-gradient(to right, #e63946, #ff3d00);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 77, 77, 0.4);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Admin</h4>
        <a href="{{ route('admin.customers.index') }}">Customer</a>
        <a href="{{ route('admin.invoices.index') }}">Invoice</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
