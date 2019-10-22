<?php

namespace App\Http\Controllers\Config;

use App\Partenaire;
use App\PartenaireEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\PartenaireRequest;
use App\Fiche;

class PartenaireController extends Controller
{

    public function __construct() {
        View::share('title', 'Partenaires');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($request->all());
        // return null;
        $partenaires = Partenaire::all();

        if(request()->ajax()){
            return $partenaires;
        }
        return view('app.partenaires.index', compact('partenaires'));
    }
    
    //get old partenaire for the fiche cible and archive
    public function getOldPartenaires(Request $request)
    {
        $f = Fiche::find($request->id);

        $partenaire_ids = $f->actions()
            ->where('action', 'Partenaire')->pluck('partenaire_id');

        $partenaires = Partenaire::whereIn('id', $partenaire_ids)->pluck('id');

        return $partenaires;

    }

    // return json partenaire
    public function getPartenaire(Request $request)
    {
        $partenaire = Partenaire::find($request->id);
        return $partenaire;
    }

    

    // Delete partenaire
    public function deletePartenaire(Request $request)
    {
        $partenaire = Partenaire::find($request->id);
        if($partenaire->emails->coun() != 0){
            foreach($partenaire->emails as $email) {
                $email->delete();
            }
        }
        $partenaire->delete();
        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartenaireRequest $request)
    {
        $validated = $request->validated();
        $partenaire = Partenaire::create($request->all());
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partenaire = Partenaire::find($id);
        $emails = $partenaire->emails;
        return view('app.partenaires.show', compact('partenaire', 'emails'));
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
        $partenaire = Partenaire::find($id);
        $partenaire->update($request->all());
        return Redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Add an Email to a partenaire
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addEmail(Request $request)
    {
        $partenaire = Partenaire::find($request->partnaire_id);
        $emailPart = PartenaireEmail::create($request->all());
        return Redirect()->back();
    }


    //Return the emails of one partenaire
    public function getEmails(Request $request, $id = null)
    {
        $partenaire = Partenaire::find($request->id);
        if ($request->ajax()){
            return $partenaire->emails;
        }
    }
}
