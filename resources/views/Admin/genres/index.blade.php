<!DOCTYPE html>
<html>
<head>
    <title>Manage Genres</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Manage Genres</h1>
        <a href="{{ route('genres.create') }}" class="bg-green-500 text-white p-2 rounded mb-4 inline-block">Add Genre</a>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Name</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td class="p-2">{{ $genre->nama_genre }}</td>
                        <td class="p-2">
                            <a href="{{ route('genres.edit', $genre) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.dashboard') }}" class="text-blue-500 mt-4 inline-block">Back to Dashboard</a>
    </div>
</body>
</html>