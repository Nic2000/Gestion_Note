<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = "notes";
    protected $fillable = [
        'eleve_id', 'matiere_id', 'note','coeff','note_finale'
    ];

    public function matiere()
    {
        return $this->belongsTo('App\Matiere');
    }
    public function eleve(){
        return $this->belongsTo('App\Eleve');
    }
}
