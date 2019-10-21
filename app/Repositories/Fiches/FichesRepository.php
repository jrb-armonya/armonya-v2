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
    public function created($excludeRappel = true, $agent = true)
    {
		$this->query->where('created_at', '!=', null);

		// exclude the rappel status
		if($excludeRappel){
			$this->excludeRappel();
		}

		if($agent){
			$this->getOnlyAgent();
		}

		return $this;
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
	
	
	// Fiche par statut (A Ecouter, A Confirmer)
	public function getByStatut($status_id)
	{
		$this->query->where('status_id', $status_id);
		return $this;
	}
 

	// Fiche Action 
	public function getByAction($action, $day = null, $month = null, $year = null)
	{
		if($day == null && $month == null && $year == null){
			$this->query->whereNotNull($action);
		}
		$this->byDate($day, $month, $year, $action);
		return $this;
	}


	// Fiches Archiver
	public function getOnlyArchiver()
	{
		 $this->query->where('is_archived', 1);
		 return $this;
	}

	//Fiches novalider
	public function noValider()
	{
		 $this->query->whereIn('status_id',config('status.noValid'));
		 return $this;
	}

	//Fiches valide aprés l'ecoute	
	public function validAfterEcoute()
	{
		$this->query->where('valid_after_ecoute',1);
		$this->getOnlyAgent();
		return $this;
	}  
	
	//Fiches par partenaire
	public function getByPartenaire($partenaire_id)
	{
		 $this->query->where('partenaire_id',$partenaire_id);
		 return $this;
		
	}

	//Fiches par user function
	public function getByUser( $user_id , $fun_id = 'user_id')
	{
		 $this->query->where($fun_id,$user_id);
		 return $this;
	}

	
   
	//Fiches par groups
	public function getByGroup($group)
	{
		$this->query->whereHas('user', function($q) use ($group){
			$q->whereHas('groups', function($q) use ($group){
				$q->where('group_id', $group);
			});
	    });
		return $this;
	}

	

}