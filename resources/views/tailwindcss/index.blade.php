<!doctype html>
<html lang="fr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopping</title>

    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 flex content-center justify-center h-full items-center">
    <div class="login-card">
        <img class="flex-1 w-full h-40 md:h-full object-cover" src="https://picsum.photos/id/1047/200/300" alt="">
        <div class="p-4 flex-1 md:flex md:flex-col justify-center items-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Connexion</h1>
            <div class="mb-4">
                <label for="username" class="block text-gray-600 mb-2">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="input">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 mb-2">Mot de passe</label>
                <input type="text" id="password" name="password" class="input">
            </div>
            <button type="submit" class="btn">Se connecter</button>
        </div>
    </div>
</body>
</html>
