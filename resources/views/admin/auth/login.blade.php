<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login administrateur</title>
</head>
<body>
    <h1>Se connecter à l'administrateur</h1>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <p>Identifiant : <input value="admin" type="text" name="identifiant" required/></p>
        <p>Mot de passe : <input value="admin" type="password" name="password"/></p>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
