<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classe;
use App\Eleve;
use App\Professeur;
use App\Matiere;
use App\Note;

class GNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Classe::all();
        $listes = Eleve::with('Classe')->get();
        return view('gnotes.create',
            ['datas' => $datas],
            ['listes' => $listes]

        );
    }
    public function create_prof(){
        $datas = Professeur::all();
        return view('gnotes.prof',compact('datas'));
    }
    public function create_mat(){
        $cl = Classe::all();
        $prof = Professeur::all();
        $datas = Matiere::with('Classe','Professeur')->get();
        return view('gnotes.mat',compact('datas','cl','prof'));
    }
    public function create_note(){
        $note = Note::all();
        $eleve = Eleve::all();
        $mat= Matiere::all();
        $datas = Note::with('Eleve','Matiere')->get();
        return view('gnotes.note',compact('eleve','mat','datas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //enregistrement des élèves
    public function store(Request $request)
    {
        //condition de validation de formulaire
        $request->validate([
            'nom' => ["string"],
            'prenom' =>  ["string"],
            'adresse' => ["string"],
            'naiss' => ["required"]
        ],
            [
                'nom.string' => 'Seuls les caractères sont acceptés',
                'prenom.string' => 'Seuls les caractères sont acceptés',
                'adresse.string' => 'Seuls les caractères sont acceptés',
                'naiss.required' => 'Entrez la date de naissance'
            ]
        );
        //récupérer id de la classe
        $id_classe = Classe::where('Nom_classe', $request->classe)->value('id');
       //enregistrement des données "input" dans la bd
        $eleve = new Eleve();
        $eleve->Nom_eleve = $request->nom;
        $eleve->Prenom_eleve = $request->prenom;
        $eleve->Date_naiss = $request->naiss;
        $eleve->Adresse = $request->adresse;
        $eleve->classe_id = $id_classe;

        $eleve->save();

        //redirection
       return redirect()->route('home');

    }
    //enregistrement des profs
    public function store_prof(Request $request){
        $prof = new Professeur();
        $prof->Nom_prof = $request->nom;
        $prof->Prenom_prof = $request->prenom;
        $prof->save();

        //redirection
        return redirect()->route('home');
    }
    //enregistrement des matieres
    public function store_mat(Request $request){
        $mat = new Matiere();
        //recupérer id prof et classe
        $id_prof = Professeur::where('Nom_prof',$request->prof) -> value('id');
        $id_classe = Classe::where('Nom_classe', $request->classe)->value('id');

        $mat->Nom_matiere = $request->nom;
        $mat->professeur_id = $id_prof;
        $mat->classe_id = $id_classe;

        $mat->save();

        //redirection
        return redirect()->route('home');
    }
    //enregistrement des notes
    public function store_note(Request  $request){
        $note = new Note();
        $id_eleve = Eleve::where('Nom_eleve',$request->nom) -> value('id');
        $id_mat = Matiere::where('Nom_matiere',$request->mat) -> value('id');
        $note->eleve_id = $id_eleve;
        $note->matiere_id = $id_mat;
        $note->note = $request->note;
        $note->coeff = $request->coeff;
        $note_finale = $request->note * $request->coeff;
        $note->note_finale = $note_finale;
        $note->save();

        //redirection
        return redirect()->route('home');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note  = Note::find($id);
        $eleve = Eleve::all();
        $mat= Matiere::all();
        return view('gnotes.edit_note',compact('note','eleve','mat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note  = Note::find($id);
        $note -> update($request->all());

        //redirection
        return redirect()->route('gnotes.create_note');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Note::destroy($id);
        //redirection
        return redirect()->route('gnotes.create_note');
    }
}
