{{view('layout.header')}}

@if(session('success'))
<div class="alert alert-success" role="alert">
    <!-- on écho le message passé à la clé success  -->
    {{session('success')}}
</div>
@endif

<a href="?order=name" class="btn btn-primary">Trier par nom</a>
<a href="?order=editor" class="btn btn-info">Trier par éditeur</a>
@if(isset($_GET['order']))
<a href="{{route('home')}}" class="btn btn-dark">Annuler le tri</a>
@endif

<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Editeur</th>
            <th scope="col">Date de sortie</th>
            <th scope="col">Console / Support</th>
            <th scope="col">Modifer</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <!-- Foreach parcours la liste des videogames
        $videogame stocke l'objet courant -->
        @foreach($videogameList as $videogame)

        <tr>
            <!-- l'objet courant permet d'accéder aux attribut de la table
            grâce à l'opérateur ->        -->
            <td>{{$videogame->id}}</td>
            <td>{{$videogame->name}}</td>
            <td>{{$videogame->editor}}</td>
            <td>{{$videogame->release_date}}</td>
            <td>{{$videogame->platform->name}}</td>
            <td>
                <form action="{{route('edit_videogame', ['id' => $videogame->id])}}" method="GET">
                    <button class="btn btn-info">Modifier</button>
                </form>
            </td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$videogame->id}}">
                    Supprimer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="{{$videogame->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Suppression de {{$videogame->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Confirmez-vous supprimer {{$videogame->name}} ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <form action="{{ route('delete_videogame', ['id' => $videogame->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
{{view('layout.footer')}}