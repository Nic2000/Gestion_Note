@extends('layouts.menu')
@section('content')
    <div class="card">
        <div class="card-header">
            Inscrire un élève
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-sm-4">
            <form action="{{route('gnotes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="nom" class="form-control col-sm-6" aria-describedby="nameHelp">
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
                    <input type="text" name="prenom" class="form-control  col-sm-6" aria-describedby="nameHelp">
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
                    <input type="date" name="naiss" min="1962-01-01" max="2003-12-31" class="form-control col-sm-6" aria-describedby="nameHelp">
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
                    <input type="text" name="adresse" class="form-control col-sm-6" aria-describedby="nameHelp">
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
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
            </div>
            <div class="col-sm-8">
                <h4>Liste des élèves</h4>
                <p>Rechercher par classe</p> <input type="text" class="form-control col-sm-4"><br>
                <button type="submit" class="btn btn-primary" name="rechercher">Rechercher</button>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Date de naissance</td>
                            <td>Adresse</td>
                            <td>Classe</td>
                            <td>Modifier</td>
                            <td>Supprimer</td>
                        </tr>
                        @foreach($listes as $el)

                        <tr>
                            <td>{{$el->Nom_eleve}}</td>
                            <td>{{$el->Prenom_eleve}}</td>
                             <td>{{$el->Date_naiss}}</td>
                            <td>{{$el->Adresse}}</td>
                             <td>{{$el->Classe->Nom_classe}}</td>
                            <td>  <a href="{{route('gnotes.edit_eleve',[$el->id])}}" class="btn btn-success m-2" role="button">Modifier</a>
                            </td>
                            <td>   <a href="{{route('gnotes.destroy_eleve',[$el->id])}}" class="btn btn-danger m-2">Supprimer</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
