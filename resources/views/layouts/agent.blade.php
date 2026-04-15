<!DOCTYPE html>
<html>

<head>
    <title>Agent Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex">

        <!-- 🔹 Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h4>Agent Panel</h4>

            <ul class="nav flex-column mt-4">

                <li class="nav-item">
                    <a href="{{ route('agent.dashboard') }}"
                        class="nav-link text-white {{ request()->routeIs('agent.dashboard') ? 'bg-secondary' : '' }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agent.customers.index') }}"
                        class="nav-link text-white {{ request()->routeIs('agent.customers.*') ? 'bg-secondary' : '' }}">
                        Customers
                    </a>
                </li>
               

            </ul>
        </div>

        <!-- 🔹 Main Content -->
        <div class="flex-grow-1">

            <!-- Top Navbar -->
            <nav class="navbar navbar-light bg-light px-3">
                <span>Welcome, {{ auth('agent')->user()->name }}</span>

                <form method="POST" action="/agent/logout">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            </nav>

            <!-- Page Content -->
            <div class="p-4">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @yield('content')

            </div>

        </div>

    </div>

</body>

</html>