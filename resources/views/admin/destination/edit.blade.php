<!DOCTYPE html>
<html>
<head>
    <title>Modifier une Destination</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Modifier une Destination</h1>
        <form action="{{ route('destination.update', $destination->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" value="{{ $destination->name }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 border rounded" required>{{ $destination->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Prix</label>
                <input type="number" name="price" id="price" class="w-full px-4 py-2 border rounded" value="{{ $destination->price }}" required>
            </div>
            <div class="mb-4">
                <label for="duration" class="block text-gray-700">Durée</label>
                <input type="text" name="duration" id="duration" class="w-full px-4 py-2 border rounded" value="{{ $destination->duration }}" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded">
                <img src="{{ asset('images/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-48 mt-2">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
