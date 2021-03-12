<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $table = "eleves";
    protected $fillable = [
        'id', 'Nom_eleve', 'Prenom_eleve','Date_naiss','Adresse', 'classe_id'
    ];

    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }
}
