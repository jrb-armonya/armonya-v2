<?php
namespace App\Services\Predictif\Http\Controllers\Commandes;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Services\Predictif\Repositories\Phones\PhoneRepository;

class CommandesController extends Controller {
    
    protected $phone;

    public function __construct(PhoneRepository $phone)
    {
        View::share('title', 'Generator');
        $this->phone = $phone;
    }

    public function create(){
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);
        // get the phones whereHas societe inFile
        // $phones = $this->phone->inFile();
        // $phonesAvailable = $phones->filter(function($val, $key){
        //     return $val['used'] == 0;
        // })->count();
        //, compact( 'phonesAvailable')
        return view('predictif::commandes.create' );
    }
}