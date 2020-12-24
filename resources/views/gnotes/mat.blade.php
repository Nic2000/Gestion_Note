@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Enregistrer une matière
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <form action="{{route('gnotes.store_mat')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="nom" class="form-control col-sm-6" aria-describedby="nameHelp">
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label >Professeur</label>
                            <select class="form-control col-sm-6" name = "prof">
                                @foreach($prof as $data)
                                    <option>{{$data->Nom_prof}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Classe</label>
                            <select class="form-control col-sm-6" name = "classe">
                                @foreach($cl as $data)
                                    <option>{{$data->Nom_classe}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <h4>Liste des matières</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nom matière</th>
                                <th>Professeur</th>
                                <th>Classe</th>
                            </tr>
                            @foreach($datas as $el)

                                <tr>
                                    <td>{{$el->Nom_matiere}}</td>
                                    <td>{{$el->Professeur->Nom_prof}}</td>
                                    <td>{{$el->Classe->Nom_classe}}</td>
                                    @endforeach
                                </tr>



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
