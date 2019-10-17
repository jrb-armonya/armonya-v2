<?php 

namespace App\Repositories\Fiches;

use App\Fiche;
use App\Repositories\BaseRepository;

/**
 * FicheRepository
 * @extends BaseRepository
 * @package Repository
 */
class FichesRepository extends BaseRepository{

    public function __construct()
    {
	   parent::__construct(new Fiche);
	   $this->query = $this->model->query();
    }

	/**
	 * Created Fiche
	 *
	 * @param int $day
	 * @param int $month
	 * @param int $year
	 * @param boolean $excludeRappel
	 * @param boolean $agent
	 * @return QueryBuilder
	 */
    public function created($day = null, $month = null, $year = null, $excludeRappel = true, $agent = true)
    {
		if($day){
			$this->query->whereDay('created_at', $day);
		}

		if($month){
			$this->query->whereMonth('created_at',$month);
		}

		if($year){
			$this->query->whereYear('created_at', $year);
		}

		// exclude the rappel status
		if($excludeRappel){
			$this->excludeRappel();
		}

		if($agent){
			$this->getOnlyAgent();
		}

		return $this->query;
	}

	/**
	 * exclude fiche rappel
	 *
	 * @return void
	 */
	private function excludeRappel() 
	{
		$this->query->whereNotIn('status_id', [29]);
	}

	/**
	 * Get only fiches by agent
	 *
	 * @return void
	 */
	private function getOnlyAgent()
	{
		$this->query->whereHas('user', function($q){
			$q->where('role_id', 2);
		});
	}
    
}