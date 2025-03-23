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
            <img src="images/{{ $destination->image }}" alt="Image de la destination" style="max-width: 100%;">
        </div>
    @else
        <p>Aucune image disponible.</p>
    @endif
</body>
</html>
