<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Review</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('reviews.store') }}" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label for="id_film" class="block text-sm font-medium">Film</label>
                <select id="id_film" name="id_film" class="w-full p-2 border rounded" required>
                    @foreach ($films as $film)
                        <option value="{{ $film->id_film }}">{{ $film->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="nilai" class="block text-sm font-medium">Rating (1-10)</label>
                <input id="nilai" type="number" name="nilai" min="1" max="10" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="komentar" class="block text-sm font-medium">Comment</label>
                <textarea id="komentar" name="komentar" class="w-full p-2 border rounded"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save</button>
        </form>
        <a href="{{ route('reviews.index') }}" class="text-blue-500 mt-4 inline-block">Back</a>
    </div>
</body>
</html>