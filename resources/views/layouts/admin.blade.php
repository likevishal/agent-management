<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3">
    <span class="text-white">Admin Panel</span>

    <form method="POST" action="/admin/logout">
        @csrf
        <button class="btn btn-danger btn-sm">Logout</button>
    </form>
</nav>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>