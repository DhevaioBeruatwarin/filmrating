<!DOCTYPE html>
<html>
<head>
    <title>Edit Genre</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Genre</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('genres.update', $genre) }}" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_genre" class="block text-sm font-medium">Genre Name</label>
                <input id="nama_genre" type="text" name="nama_genre" value="{{ $genre->nama_genre }}" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
        </form>
        <a href="{{ route('genres.index') }}" class="text-blue-500 mt-4 inline-block">Back</a>
    </div>
</body>
</html>