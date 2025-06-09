<!DOCTYPE html>
<html>
<head>
    <title>My Reviews</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">My Reviews</h1>
        <a href="{{ route('reviews.create') }}" class="bg-green-500 text-white p-2 rounded mb-4 inline-block">Add Review</a>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Film</th>
                    <th class="p-2">Rating</th>
                    <th class="p-2">Comment</th>
                    <th class="p-2">Date</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td class="p-2">{{ $review->film->judul }}</td>
                        <td class="p-2">{{ $review->nilai }}</td>
                        <td class="p-2">{{ $review->komentar }}</td>
                        <td class="p-2">{{ $review->tanggal }}</td>
                        <td class="p-2">
                            @can('update', $review)
                                <a href="{{ route('reviews.edit', $review) }}" class="text-blue-500">Edit</a>
                            @endcan
                            @can('delete', $review)
                                <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('dashboard') }}" class="text-blue-500 mt-4 inline-block">Back to Dashboard</a>
    </div>
</body>
</html>