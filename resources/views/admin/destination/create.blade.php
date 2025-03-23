<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Créer une nouvelle destination</h1>
    <form action="{{ route('destination.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="price">Prix :</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" required>
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="duration_trip">Durée du voyage :</label>
            <input type="text" name="duration_trip" id="duration_trip" value="{{ old('duration_trip') }}" required>
            @error('duration_trip')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" accept="image/*">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Créer</button>
    </form>
    <a href="{{ route('destination.index') }}">Retour à la liste</a>
</body>
</html>
