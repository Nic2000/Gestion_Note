@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Inscrire un élève
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-sm-6">
            <form action="{{route('gnotes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="nom" class="form-control col-sm-6" aria-describedby="nameHelp">
                    <small class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="first-name">Prenom</label>
                    <input type="text" name="prenom" class="form-control  col-sm-6" aria-describedby="nameHelp">
                    <small class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="naissance">Date de naissance</label>
                    <input type="date" name="naiss" class="form-control col-sm-6" aria-describedby="nameHelp">
                    <small class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control col-sm-6" aria-describedby="nameHelp">
                    <small class="form-text text-muted"></small>
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
            <div class="col-sm-6">
                <h4>Liste des élèves</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Date de naissance</td>
                            <td>Adresse</td>
                            <td>Classe</td>
                        </tr>
                        @foreach($listes as $el)

                        <tr>
                            <td>{{$el->Nom_eleve}}</td>
                            <td>{{$el->Prenom_eleve}}</td>
                             <td>{{$el->Date_naiss}}</td>
                            <td>{{$el->Adresse}}</td>
                             <td>{{$el->Classe->Nom_classe}}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
