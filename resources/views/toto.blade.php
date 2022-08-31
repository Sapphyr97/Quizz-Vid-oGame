<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toto</title>
</head>
<body>
    <a href="{{route('tataUrl')}}">Tata</a>
    <h1>Toto</h1>
    <!-- Ici la variable $name a bien été transmise à la vue 
    Afin de l'afficher, on utlise la syntaxe des doubles accolades ci-dessous
    Cette syntaxe correspond au echo de php -->
    <h3>Bonjour {{$name}}</h3>
    <form action="" method="GET">
        <label for="surname">Nom</label>
        <input type="text" name="surname">
        <button type="submit">Entrer</button>
    </form>
    <h1>Bonjour {{$surname}}</h1>
    <!-- dd correspond au var_dump de php -->
    {{dd($name2)}}
</body>
</html>