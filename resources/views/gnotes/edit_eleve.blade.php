@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-body">
            <form action="{{ route('gnotes.update_eleve', $eleve->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="nom" class="form-control col-sm-6" aria-describedby="nameHelp" value = {{$eleve->Nom_eleve}}>
                    <small class="form-text text-muted"></small>
                    <!--affichage d'erreur-->
                    @error('nom')
                    <div class="col-xs-4">
                        <span style = "color:#ff0000;"> {{$message}} </span>
                    </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="first-name">Prenom</label>
                    <input type="text" name="prenom" class="form-control  col-sm-6" aria-describedby="nameHelp" value =  {{$eleve->Prenom_eleve}}>
                    <small class="form-text text-muted"></small>
                    <!--affichage d'erreur-->
                    @error('prenom')
                    <div class="col-xs-4">
                        <span style = "color:#ff0000;"> {{$message}} </span>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="naissance">Date de naissance</label>
                    <input type="date" name="naiss" min="1962-01-01" max="2003-12-31" class="form-control col-sm-6" aria-describedby="nameHelp" value = {{$eleve->Date_naiss}}>
                    <small class="form-text text-muted"></small>
                    <!--affichage d'erreur-->
                    @error('naiss')
                    <div class="col-xs-4">
                        <span style = "color:#ff0000;"> {{$message}} </span>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control col-sm-6" aria-describedby="nameHelp" value = {{$eleve->Adresse}}>
                    <small class="form-text text-muted"></small>
                    <!--affichage d'erreur-->
                    @error('adresse')
                    <div class="col-xs-4">
                        <span style = "color:#ff0000;"> {{$message}} </span>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Classe</label>
                    <select class="form-control col-sm-6" name = "classe">
                        @foreach($datas as $data)
                            <option>{{$data->Nom_classe}}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>


@endsection
