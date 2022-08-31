{{view('layout.header')}}
<div class="card">
    <div class="card-header">Ajout</div>
    <div class="card-body">
        <form action="{{route('admin_create_videogame')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="">
            </div>
            <div class="form-group">
                <label for="editor">&Eacute;diteur</label>
                <input type="text" class="form-control" name="editor" id="editor" placeholder="">
            </div>
            <div class="form-group">
                <label for="release_date">Date de sortie</label>
                <input type="text" class="form-control" name="release_date" id="release_date" placeholder="">
            </div>
            <div class="form-group">
                <label for="platform">Console / Support</label>
                <select class="custom-select" id="platform" name="platform">
                    @foreach($platformList as $platform)
                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Ajouter</button>
        </form>
    </div>
</div>
{{view('layout.footer')}}