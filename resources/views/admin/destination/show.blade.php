<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $destination->name }}</h1>
    <p>{{ $destination->description }}</p>
    <p>Prix : {{ $destination->price }}</p>
    <p>Durée du voyage : {{ $destination->duration_trip }}</p>

    @if ($destination->image)
        <div>
            <h3>Image :</h3>
            <img src="{{ asset('images/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-full h-48 object-cover mb-4 rounded">
        </div>
    @else
        <p>Aucune image disponible.</p>
    @endif
    <a href="{{ route('destination.index') }}">Retour à la liste</a>
</body>
</html>
