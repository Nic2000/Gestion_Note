@extends('layouts.menu')
@section('content')
    <div class="card">
        <div class="card-header">
            Enregistrer un professeur
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <form action="{{route('gnotes.store_prof')}}" method="POST">
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
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <h4>Liste des professeurs</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                            </tr>
                            @foreach($datas as $el)

                            <tr>
                                <td>{{$el->Nom_prof}}</td>
                                <td>{{$el->Prenom_prof}}</td>
                            @endforeach
                            </tr>



                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
