<!DOCTYPE html>
<html>
<head>
    <title>Add Film</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Film</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('films.store') }}" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium">Title</label>
                <input id="judul" type="text" name="judul" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="sutradara" class="block text-sm font-medium">Director</label>
                <input id="sutradara" type="text" name="sutradara" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="genre_id" class="block text-sm font-medium">Genre</label>
                <select id="genre_id" name="genre_id" class="w-full p-2 border rounded" required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id_genre }}">{{ $genre->nama_genre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium">Year</label>
                <input id="tahun" type="number" name="tahun" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save</button>
        </form>
        <a href="{{ route('films.index') }}" class="text-blue-500 mt-4 inline-block">Back</a>
    </div>
</body>
</html>