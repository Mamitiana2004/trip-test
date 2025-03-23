<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des destinations</h1>
    <a href="{{ route('destination.create') }}">Créer une nouvelle destination</a>
    <ul>
        @foreach ($destinations as $destination)
            <li>
                {{ $destination->name }}
                <a href="{{ route('destination.show', $destination) }}">Voir</a>
                <a href="{{ route('destination.edit', $destination) }}">Modifier</a>
                <form action="{{ route('destination.destroy', $destination) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
