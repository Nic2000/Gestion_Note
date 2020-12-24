@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-body">
            <form action="{{ route('gnotes.update', $note->id) }}" method="post">
                @csrf
                @method('PUT')
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

                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>


@endsection
