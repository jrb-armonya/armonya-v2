<?php

namespace App\Export;

use App\Fiche;
use PDF;

class Export {

    // The fiche to Export
    private $fiche;
    private $view = "layouts.pdf.fiche";
    
    public function __construct(Fiche $fiche){
        $this->fiche = $fiche;
    }

    /** 
     *  Save a pdf and return its path
     * 
     * @return string $path
     */
    public function exportToPdf() 
    {
        $data = $this->fiche;
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView($this->view, ['data' => $data ]);
        
        // // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path('fiches/pdf/'). $this->fiche->id . ' - ' . $this->fiche->name .  ' ' . $this->fiche->prenom . '.pdf');

        return storage_path('fiches/pdf/'). $this->fiche->id . ' - ' . $this->fiche->name .  ' ' . $this->fiche->prenom . '.pdf';
    }

    
    public function viewPdf($id){
        
        $data = Fiche::find($id);
        return view($this->view, compact('data'));

    }

}