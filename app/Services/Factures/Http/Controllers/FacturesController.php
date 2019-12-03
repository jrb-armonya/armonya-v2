<?php

namespace App\Services\Factures\Http\Controllers;

use App\Fiche;
use App\PDFFile;
use App\Partenaire;

use App\Export\Exportable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Factures\Models\Facture;

class FacturesController extends Controller
{

    /**
     * Exportable trait, makethe facture exportable
     */
    use Exportable;


    /**
     * $viewPdf
     *
     * @var undefined
     */
    protected $viewPdf = "factures::pdf.facture";


    protected $storageDir = "factures/";

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        view()->share('title', 'Facturation');
    }

    /**
     * index
     *
     * @param Facture $factures
     * @return void
     */
    public function index(Facture $factures)
    {
        return view('factures::index')->with('factures', $factures->all());
    }

    /**
     * create
     *
     * @param Partenaire $partenaires
     * @return void
     */
    public function create(Partenaire $partenaires)
    {
        $partenaires = $partenaires->all();
        return view('factures::create', compact('partenaires'));
    }

    /**
     * store
     *
     * @param Request $request
     * @param Partenaire $partenaire
     * @return void
     */
    public function store(Request $request)
    {
        // generate the UUID

        $facture = Facture::create([
            'partenaire_id' => $request->partenaire_id,
            'status'        => 'vide'
        ]);

        // return view('app.factures.show', compact('facture', 'partenaire', 'title'));
        return $this->show($facture->id);
    }


    /**
     * show
     *
     * @param mixed $id
     * @return void
     */
    public function show($id)
    {
        $facture = Facture::find($id);
        $partenaire = Partenaire::find($facture->partenaire_id);

        return view('factures::show', compact('facture', 'partenaire'));
    }


    /**
     * addFiche
     *
     * @param mixed $fiche_id
     * @param mixed $facture_id
     * @return void
     */
    public function attacheFiche($fiche_id, $facture_id)
    {
        $facture = Facture::find($facture_id);
        $fiche = Fiche::find($fiche_id);
        $fiche->facture_id = $facture_id;
        $fiche->save();

        $facture->status = "En Attente";
        $facture->save();
        return $this->show($facture->id);
    }

    /**
     * deleteFiche
     *
     * @param mixed $fiche_id
     * @param mixed $facture_id
     * @return void
     */
    public function detachFiche($fiche_id, $facture_id)
    {
        $fiche = Fiche::find($fiche_id);
        $facture = Facture::find($facture_id);
        $fiche->facture_id = null;
        $fiche->save();

        if ($facture->fiches->count() == 0) {
            $facture->status = "vide";
            $facture->save();
        }
        return $this->show($facture->id);
    }

    /**
     * preview (POST)
     *
     * @param mixed $id
     * @return void
     */
    public function preview(Request $request, $id)
    {

        $facture = Facture::find($id);

        if (isset($request->type))
            $facture->update(['type' => $request->type]);

        $partenaire = Partenaire::find($facture->partenaire_id);

        return view('factures::preview.preview', compact('facture', 'partenaire'));
    }



    /**
     * generateAndDownlaodPDF
     *
     * get the facture to generate and download
     * add the name partenaire to the storage dir
     * new PDFFile()
     * update PDFFile path
     * attach facture to PDFFile
     * generate PDF (trait Exportable)
     * 
     * @param mixed $id
     * @return void
     */
    public function generateAndDownlaodPDF($id)
    {


        $facture = Facture::find($id);

        $this->storageDir = $this->storageDir . str_replace(' ', '_', $facture->partenaire->name) . '/';
        // Create Or Edit existant PDFFile
        $PDFFile = new PDFFile();

        if ($facture->pdf_id != null) {
            $PDFFile = $PDFFile->find($facture->pdf_id);
        }

        $PDFFile->path = storage_path($this->storageDir) . $facture->id . '.pdf';
        $PDFFile->save();
        // Attach the model to the PDFFile
        $facture->pdf_id = $PDFFile->id;
        $facture->save();

        return $this->generatePDF($facture, $this->viewPdf, $this->storageDir);
    }

    /**
     * Set the type of the Facture: detaillée or groupée
     * détaillée : 1
     * groupée: 2
     *
     * @param Request $request
     * @return json
     */
    public function setType(Request $request)
    {
        Facture::find($request->id)->update(['type' => $request->type]);
        return \response()->json(200);
    }
}
