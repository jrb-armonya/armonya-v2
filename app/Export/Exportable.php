<?php

namespace App\Export;

use PDF;
use App\PDFFile;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

trait Exportable{

    /**
     * download

     * create dir if not exist
     * store the file in storage/$storageDir
     * download the pdf
     * 
     * @param Model $model le model a exporter
     * @param String $view l'url de la vue.
     * @param String $storageDir dossier dans le quel enregistrer
     * @return void
     */
    public function generatePDF(Model $model, String $view, String $storageDir){
        // Load the pdf
        $pdf = PDF::loadView($view, ['data' => $model]);

        $this->checkStorageDir($storageDir);

        // Store the pdf
        $pdf->save(storage_path($storageDir). $model->id .'.pdf');

        // Return the downlaod
        return $pdf->download();
    }

    
    /**
     * checkStorageDir
     * create a dir in /storage folder if not exist
     * @param String $dir
     * @return void
     */
    protected function checkStorageDir(String $storageDir){

        if( !File::exists( storage_path($storageDir) ) ) {
            File::makeDirectory(storage_path($storageDir), $mode = 0777, true, true);
        }

    }

}