<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{-- @php
        $user = Auth::user();
    @endphp --}}

    <h3>Bonjour, {{ $name }}</h3>
    <br />
    <hr>


    @if ($if_update == 0)
        <p>
            Votre administrateur à créer votre compte. Cette email contient vos informations de connexion <br />
            Conserver dans un lieu sûr.
        </p>

        <h5>Mot de passe : {{ $password }}</h5>

        <h5>Nom d'utilisateur : {{ $username }}</h5>
    @endif

    @if ($if_update == 1)
        <p>
            Votre administrateur à modifier votre compte. <br />
            Cette email contient vos nouvelles informations de connexion
        </p>

        <h5>Nouveau mot de passe : Inchanger</h5>

        <h5>Nouveau Nom d'utilisateur : {{ $username }}</h5>
    @endif

    @if ($if_update == 2)
        <p>
            Votre administrateur à modifier votre compte. <br />
            Cette email contient vos nouvelles informations de connexion
        </p>

        <h5>Nouveau mot de passe : {{ $password }}</h5>

        <h5>Nouveau Nom d'utilisateur : {{ $username }}</h5>
    @endif


    

</body>
</html>