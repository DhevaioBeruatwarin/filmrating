<!DOCTYPE html>
<html>
<head>
    <title>Manage Films</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Manage Films</h1>
        <a href="{{ route('films.create') }}" class="bg-green-500 text-white p-2 rounded mb-4 inline-block">Add Film</a>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Title</th>
                    <th class="p-2">Director</th>
                    <th class="p-2">Genre</th>
                    <th class="p-2">Year</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
                        <td class="p-2">{{ $film->judul }}</td>
                        <td class="p-2">{{ $film->sutradara }}</td>
                        <td class="p-2">{{ $film->genre->nama_genre }}</td>
                        <td class="p-2">{{ $film->tahun }}</td>
                        <td class="p-2">
                            <a href="{{ route('films.edit', $film) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('films.destroy', $film) }}" method="POST" class="inline">
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