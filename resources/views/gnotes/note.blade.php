@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Enregistrer une note
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <form action="{{route('gnotes.store_note')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nom élève</label>
                            <select class="form-control col-sm-6" name = "nom">
                                @foreach($eleve as $data)
                                    <option>{{$data->Nom_eleve}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Matière</label>
                            <select class="form-control col-sm-6" name = "mat">
                                @foreach($mat as $data)
                                    <option>{{$data->Nom_matiere}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <input type="number" name="note" class="form-control col-sm-6" aria-describedby="nameHelp">
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="coeff">Coefficient</label>
                            <input type="number" name="coeff" class="form-control col-sm-6" aria-describedby="nameHelp">
                            <small class="form-text text-muted"></small>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
                <div class="col-sm-8">
                    <h4>Liste des notes</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nom élève</th>
                                <th>Matière</th>
                                <th>Note</th>
                                <th>Coefficient</th>
                                <th>Note finale</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            @foreach($datas as $el)

                                <tr>
                                    <td>{{$el->Eleve->Nom_eleve}}</td>
                                    <td>{{$el->Matiere->Nom_matiere}}</td>
                                    <td>{{$el->note}}</td>
                                    <td>{{$el->coeff}}</td>
                                    <td>{{$el->note_finale}}</td>
                                    <td>   <a href="{{route('gnotes.edit',[$el->id])}}" class="btn btn-success m-2" role="button">Modifier</a>
                                    </td>
                                    <td>   <a href="{{route('gnotes.delete',[$el->id])}}" class="btn btn-danger m-2">Supprimer</a>
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
