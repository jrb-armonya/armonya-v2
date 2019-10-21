<?php

namespace App\Repositories\Rapports;

use App\ReportManager;
use App\Repositories\BaseRepository;

class ReportRepository extends BaseRepository
{
    public function __construct()
    {
	   parent::__construct(new ReportManager);
	   $this->query = $this->model->query();
    }
    /**
     * Get Report by user and state
     *
     * @param int $user_id
     * @param string $state
     * @return void
     */
    public function getReportBy($user_id,$state=null)
    {
        $this->query->where('user_id',$user_id);
        switch($state){
            case 'pris':
            $this->query->where('state',null);
            break;  
            case 'confirmer':
            $this->query->whereIn('state',[1,2]);
            break;
            case 'envoyer':
            $this->query->where('state',2);
            break;     
        }
        return $this;
    }
    /**
     * Get last user report fiche
     */
    public function getLastUserBy($fiche_id)
    {   
        $this->query->where('fiche_id',$fiche_id)
        ->orderBy('updated_at', 'desc')
        ->limit(1);
        return $this;
    }
       
}