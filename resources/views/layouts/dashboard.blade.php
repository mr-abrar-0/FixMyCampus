<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | Smart Campus')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="dashboard-layout">
        <aside class="sidebar">
            <div class="sidebar-logo">Smart Campus</div>
            <ul class="sidebar-menu">
                @yield('sidebar')
                <li><a href="{{ route('logout') }}" class="logout-link">Logout</a></li>
            </ul>
        </aside>

        <main class="main-content">
            @if(session('success'))
                <div class="alert success-alert">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert error-alert">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="alert error-alert">{{ $errors->first() }}</div>
            @endif

            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
