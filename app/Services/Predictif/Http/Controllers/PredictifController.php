<?php
namespace App\Services\Predictif\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Services\Predictif\Repositories\Phones\PhoneRepository;
use App\Services\Predictif\Repositories\Societes\SocieteRepository;

/**
 * Return the Magasin index
 * Entry point of the predictif: 
 *  - will share 4 variables (phoneTotal, phoneFile, socTotal, socFile)
 *  - return the index of the predictif 
 */
class PredictifController extends Controller {
    

    public $societes;

    public $availableSocietes;
    public $availablePhonesCount;
    public $phones;

    /**
     * __construct
     *
     * @param SocieteRepository $societe
     * @param PhoneRepository $phone
     * @return void
     */
    public function __construct(SocieteRepository $societe, PhoneRepository $phone)
    {
        View::share('title', 'Generator');
        $this->getCounters($societe, $phone);
        $this->shareCounters();
    }

    /**
     * getCounters
     *
     * @param Societe $societe
     * @param Phone $phone
     * @return void
     */
    protected function getCounters(SocieteRepository $societe, PhoneRepository $phone)
    {
        // Societe <Collection>
        $this->societes = $societe->getWithAvailablePhones();
        // Available Societes <Collection>
        $this->availableSocietes = $this->societes->filter(function($val, $key){
            return $val['inFile'] == 1;
        });
        // Phones <int>
        $this->phones = $phone->countAll();
        // Available Phones Count <Int>
        $this->availablePhonesCount = 0;
        foreach($this->availableSocietes as $soc){
            $this->availablePhonesCount += $soc->available_phones()->count();
        }

    }

    /**
     * shareCounters
     * Share the 4 Counters
     * @return void
     */
    protected function shareCounters()
    {
        View::share('societes', $this->societes);
        View::share('availableSocietes', $this->availableSocietes);
        View::share('phonesCount', $this->phones);
        View::share('availablePhonesCount', $this->availablePhonesCount);
    }

    /**
     * index
     *  retourn la vue index (entré du service)
     * @return view
     */
    public function index()
    {

        return view('predictif::magasin.index');
    }
}