{{view('layout.header')}}

<!-- Si session contient une clé success
Mon insertion a donc fontionné -->
@if(session('success'))
<div class="alert alert-success" role="alert">
    <!-- on écho le message passé à la clé success  -->
    {{session('success')}}
</div>
@endif

<!-- Si session contient une clé failed
Mon insertion a donc fontionné -->
@if(session('failed'))
<div class="alert alert-warning" role="alert">
    <!-- on écho le message passé à la clé failed -->
    {{session('failed')}}
</div>
@endif

<!-- On récupère l'objet $errors si une ou plusieurs des conditions 
préparées dans le UserController lors de l'execution de la fonction validate
n'est pas rencontrés
Si l'objet contenu dans $errors est bien rempli avec des messages d'erreurs
->any() sera alors true -->
@if($errors->any())
<div class="alert alert-danger" role="alert">
    <!-- Pour chaque $errors ->all() nous permet de récupérer le tableau des messages d'erreurs -->
    @foreach($errors->all() as $error)
        <!-- On echo la valeur de l'erreur ou des erreurs qui sont survenu(es) lors de la validation du formulaire -->
        <li>{{$error}}</li>
    @endforeach
</div>
@endif

<h1>Inscription</h1>

<form action="{{route('signup_create_user')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Adresse e-mail</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

{{view('layout.footer')}}