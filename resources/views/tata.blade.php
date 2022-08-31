<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tata</title>
</head>
<body>
    <h1>Tata</h1>
    <form action="">
        <label for="number">Nombre</label>
        <input type="number" name="number">
        <button type="submit">Entrer</button>
    </form>

    @if(!empty($_GET))
        <h3>{{$result}}</h3>
        @else
        <h3>Entrez un numéro</h3>
    @endif

</body>
</html>