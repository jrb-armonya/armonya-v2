<?php

namespace App\Services\Predictif\Http\Controllers;

use App\Services\Predictif\Repositories\Phones\PhoneRepository;
use App\Services\Predictif\Repositories\Societes\SocieteRepository;


class UnusedNumbersController {

    private $societe;
    private $societes;
    private $phone;

    private $availableSocietes;
    private $availablePhonesCount;
    
    public function __construct(SocieteRepository $societe, PhoneRepository $phone)
    {
        $this->societe = $societe;
        $this->phone = $phone;
    }

    public function get()
    {
        // Societe <Collection>
        $this->societes = $this->societe->getWithAvailablePhones();
        // Available Societes <Collection>
        $this->availableSocietes = $this->societes->filter(function($val, $key){
            return $val['inFile'] == 1;
        });
        // Phones <int>
        $this->phones = $this->phone->countAll();
        // Available Phones Count <Int>
        $this->availablePhonesCount = 0;
        foreach($this->availableSocietes as $soc){
            $this->availablePhonesCount += $soc->available_phones()->count();
        }

        return $this->availablePhonesCount;
    }

}