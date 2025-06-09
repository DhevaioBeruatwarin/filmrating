<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->username }}!</h1>
        <div class="mb-4">
            <a href="{{ route('reviews.index') }}" class="text-blue-500">My Reviews</a> |
            <a href="{{ route('watchlists.index') }}" class="text-blue-500">My Watchlist</a>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-white p-2 rounded">Logout</button>
        </form>
    </div>
</body>
</html>