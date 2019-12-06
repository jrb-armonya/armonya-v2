<?php
namespace App\Services\Predictif\Http\Controllers\Files;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Services\Predictif\Models\File;
use App\Services\Predictif\Models\Phone;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Services\Predictif\Models\Societe;
use Symfony\Component\HttpFoundation\StreamedResponse;




class FilesController extends Controller {

    public function __construct()
    {
        View::share('title', 'Predictif / Fichiers');
    }


    public function index(){
        $files = File::all();
        return view('predictif::files.index', compact('files'));
    }

    public function show($id)
    {
        $societes = [];
        // get the file
        $file = File::where('id', $id)->with('phones')->first();
        // get the societes of the file
        foreach($file->phones as $phone){
            if(!in_array($phone->societe, $societes)){
                array_push($societes, $phone->societe);
            }
        }
        return view('predictif::files.show', compact('file', 'societes'));
    }

    public function create(){
        ini_set('memory_limit', '-1');
        $societes = Societe::where('inFile', 1)->with('available_phones')->get();

        $phones = Phone::whereHas('societe', function($q){
            $q->where('inFile', 1);
        })->get();

        $phonesAvailable = $phones->filter(function($val, $key){
            return $val['used'] == 0;
        });

        // return $societes;
        // if(request()->ajax()){
        //     return $societes;
        // }
        return view('predictif::files.create', compact('phones', 'phonesAvailable'));
    }

    // TODO: TO DELETE
    public function generate($id)
    {
        $phones_to_generate = [];
        $file = File::find($id);

        foreach($file->societes as $soc)
        {
            foreach($soc->phones as $phone)
            {
                array_push($phones_to_generate, [$phone->nbr, $phone->societe->name]);
            }
        }

        // $phones_to_generate = $phones_to_generate[0];
        shuffle($phones_to_generate);
        $columnArray = array_chunk($phones_to_generate, 1);

        $streamedResponse = new StreamedResponse();
        $streamedResponse->setCallback(function () use($phones_to_generate) {
            $spreadsheet = new Spreadsheet();
            $spreadsheet->getActiveSheet()->fromArray($phones_to_generate, NULL,'A1');
            $writer =  new Xlsx($spreadsheet);
            $writer->save('php://output');
        });
        $streamedResponse->setStatusCode(Response::HTTP_OK);
        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $streamedResponse->headers->set('Content-Disposition', 'attachment; filename="your_file.xlsx"');
        return $streamedResponse->send();

    }


    public function generateNewFile(Request $request)
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);
        $phones = Phone::whereHas('societe', function($q){
            $q->where('inFile', 1);
        })->where('used', 0)->where('file_id', null)->limit($request->nbrPhones)->inRandomOrder()->get();
        $phones_to_generate = [];


        $file = new File();
        $file->name = $request->file_name;
        $file->save();


        foreach($phones as $phone)
        {
            $phone->used = 1;
            $phone->file_id = $file->id;
            $phone->save();
            array_push($phones_to_generate, [$phone->nbr, $phone->societe->adresse, $phone->societe->name]); 
            shuffle($phones_to_generate);
        }
        shuffle($phones_to_generate);
        shuffle($phones_to_generate);
        shuffle($phones_to_generate);

        $file->phones_nbr = sizeof($phones_to_generate);
        // $file->societe_nbr = $societes->count();
        $file->save();

        $columnArray = array_chunk($phones_to_generate, 1);

        $streamedResponse = new StreamedResponse();
        $streamedResponse->setCallback(function () use($phones_to_generate) {
            $spreadsheet = new Spreadsheet();
            $spreadsheet->getActiveSheet()->fromArray($phones_to_generate, NULL,'A1');
            $writer =  new Xlsx($spreadsheet);
            $writer->save('php://output');
        });
        $streamedResponse->setStatusCode(Response::HTTP_OK);
        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $streamedResponse->headers->set('Content-Disposition', 'attachment; filename="'. $file->name .'.xlsx"');

        $file->generated = 1;
        $file->save();
        ini_set('memory_limit', '-1');
        return $streamedResponse->send();
    }
}