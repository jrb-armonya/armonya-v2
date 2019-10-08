<?php 
namespace App\Repositories\Fiches;

use App\Fiche;

class FichesRepository{

    protected $modal;

    public function __construct(Fiche $modal) {
        $this->modal = $modal;
    }

    public function createdThisMonth() {
        return $this->modal->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'));
    }
    public function createdThisMonthByAgent() {
        return $this->createdThisMonth()
            ->whereHas('user', function ($query) {
                $query->where('role_id', '=', 2);
        })->get();
    }
    public function createdThisMonthByOthers() {
        return $this->createdThisMonth()
            ->whereHas('user', function ($query) {
                $query->where('role_id', '!=', 2);
        })->get();
    }

    public static function createdToday() {
        return self::createdThisMonth()->whereDay('created_at', date('d'));
    }
    public function createdTodayByAgent() {
        return $this->createdToday()
            ->whereHas('user', function ($query) {
                $query->where('role_id', '=', 2);
        })->get();
    }
    public function createdTodayByOthers() {
        return $this->createdToday()
            ->whereHas('user', function ($query) {
                $query->where('role_id', '!=', 2);
        })->get();
    }

    public function createdMonth($month, $year) {
        return $this->modal->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
    }
    

    public function ecouterMonth($month) {}
    public function ecouterDay(){}
    
    public function confirmerMonth($month) {}
    public function confirmerDay(){}
    
    public function reporterMonth($month) {}
    public function reporterDay(){}

    public function envoyerMonth($month) {}
    public function envoyerDay(){}

    public function ciblerMonth($month) {}
    public function ciblerDay(){}

    
}