<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $table = "matieres";

    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }
    public function professeur()
    {
        return $this->belongsTo('App\Professeur');
    }
}
