<!DOCTYPE html>
<html>
<head>
    <title>Liste des Destinations</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Liste des Destinations</h1><div class="mt-4">
            <a href="{{ route('admin.login')}}" class="bg-blue-500 text-white px-4 py-2 rounded">Se connecter au back office</a>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($destinations as $destination)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-full h-48 object-cover mb-4 rounded">
                    <h2 class="text-xl font-bold">{{ $destination->name }}</h2>
                    <p class="text-gray-700">{{ $destination->description }}</p>
                    <p class="text-gray-900 font-bold mt-2">{{ $destination->price }} €</p>
                    <p class="text-gray-600">{{ $destination->duration }}</p>
                    <div class="mt-4">
                        <a href="{{ route('public.destination.show', $destination->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Voir</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
