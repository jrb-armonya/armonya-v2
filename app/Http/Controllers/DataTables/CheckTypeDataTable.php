<?php 
namespace App\Http\Controllers\DataTables;

use App\Fiche;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
 * @method getData set the data , recordsTotal and recordsFiltred
 * @method search search in $this->datatable['date'] if $search Like 
 * @method getTheOffset get the offset (data to display in the view table)
 */
class CheckTypeDataTable extends Controller{

    /**
     * @param array $params contain all the params to display the datatable
     */
    protected $params;

    /**
     * @param array $dateRange contain the start_date and end_date
     */
    protected $dateRange;

    /**
     * @param object $params contain all the params to display the datatable
     * @param Builder $data
     * @param int recordsTotal number of total records
     * @param int recordsFiltered number of records passed the filter
     * 
     */
    public $datatable;

    /**
     * new instance of the controller
     * 
     */
    public function __construct($params, $dateRange) {

        $this->params = $params;

        $this->dateRange = $dateRange;

        $this->getData();

        $this->search();

        $this->checkDateRange();

        $this->getTheOffset();

    }

    protected function getData() {
        
        // Toutes les fiches (fiches.toutes)
        if($this->params['type'] ==  "Toutes les fiches") {
            $recordsTotal = Fiche::where('status_id', '!=', 29)->count();
            $data = Fiche::where('created_at', '!=', null)->where('status_id', '!=', 29);
        }
        
        // if get fiches by status
        if($this->params['type'] == "status") {
            // if status === cible => afficher que les fiche non archiver (is_archived == 0)
            if($this->params['status_id'] == 10) {
                $recordsTotal = Fiche::where('status_id', $this->params['status_id'])->where('is_archived', 0)->count();
                $data = Fiche::where('status_id', $this->params['status_id'])->where('is_archived', 0);
            }
            else {
                $recordsTotal = Fiche::where('status_id', $this->params['status_id'])->count();
                $data = Fiche::where('status_id', $this->params['status_id']);
            }
        }

        if($this->params['type'] == "Créer ce mois") {
            $recordsTotal = Fiche::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('status_id', '!=', 29)->count();
            $data = Fiche::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->where('status_id', '!=', 29);
        }

        if($this->params['type'] == "done_status") {
            // ecoute
            if($this->params['status_id'] == 1) {
                $recordsTotal = Fiche::whereMonth('d_ecoute', date('m'))->whereYear('d_ecoute', date('Y'))->count();
                $data = Fiche::whereMonth('d_ecoute', date('m'))->whereYear('d_ecoute', date('Y'));
            }

            // report
            if($this->params['status_id'] == 3) {
                $recordsTotal = Fiche::whereMonth('d_repo', date('m'))->whereYear('d_repo', date('Y'))->count();
                $data = Fiche::whereMonth('d_repo', date('m'))->whereYear('d_repo', date('Y'));
            }

            // confirm
            if($this->params['status_id'] == 5) {
                $recordsTotal = Fiche::whereMonth('d_confirm', date('m'))->whereYear('d_confirm', date('Y'))->count();
                $data = Fiche::whereMonth('d_confirm', date('m'))->whereYear('d_confirm', date('Y'));
            }

            
        }

        if($this->params['type'] == "noValid") {
            $recordsTotal = Fiche::whereIn('status_id', \Config::get('status.noValid'))->count();
            $data = Fiche::whereIn('status_id', \Config::get('status.noValid'));
        }

        if($this->params['type'] == "Archive Ciblée") {
            $recordsTotal = Fiche::where('status_id', 10)->where('is_archived',1)->count();
            $data = Fiche::where('status_id', 10)->where('is_archived',1);
        }

        if($this->params['type'] == 'Plateau'){
            $recordsTotal = Fiche::whereMonth('created_at', date('m'))->whereHas('user',function($q){
                $q->where('role_id', 2);
            })->count();
            $data = Fiche::whereMonth('created_at', date('m'))->whereHas('user',function($q){
                $q->where('role_id', 2);
            });
        }

        if($this->params['type'] == "Plateau Valid"){
            $recordsTotal = Fiche::whereMonth('created_at', date('m'))->where('valid_after_ecoute', 1)->whereHas('user',function($q){
                $q->where('role_id', 2);
            })->count();
            $data = Fiche::whereMonth('created_at', date('m'))->where('valid_after_ecoute', 1)->whereHas('user',function($q){
                $q->where('role_id', 2);
            });
        }
        if($this->params['type'] == "Plateau Non Valid"){
            $recordsTotal = Fiche::whereMonth('created_at', date('m'))->where('no_valid_after_ecoute', 1)->whereHas('user',function($q){
                $q->where('role_id', 2);
            })->count();
            $data = Fiche::whereMonth('created_at', date('m'))->where('no_valid_after_ecoute', 1)->whereHas('user',function($q){
                $q->where('role_id', 2);
            });
        }

        if($this->params['type'] == "Fiches Confirmées"){
            $recordsTotal = Fiche::whereDay('d_confirm', date('d'))->whereMonth('d_confirm', date('m'))->whereYear('d_confirm', date('Y'))->count();
            $data = Fiche::whereDay('d_confirm', date('d'))->whereMonth('d_confirm', date('m'))->whereYear('d_confirm', date('Y'));
            
        }

        // $data = $data->offset($this->params['start'])
        //     ->limit($this->params['limit'])
        //     ->orderBy($this->params['order'],$this->params['dir'])
        // ->with('status');
        
        $recordsFiltered = $recordsTotal;
        
        $this->datatable  = [
            'data' => $data,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered
        ];

    }

    protected function search() {

        if($this->params['search']){
            $search = $this->params['search'];
            $this->datatable['data'] = $this->datatable['data']->where(function($q) use($search){
                $q->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('prenom', 'LIKE', "%{$search}%")
                ->orWhere('cp', 'LIKE', "%{$search}%")
                ->orWhere(function($q) use ($search){
                    $q->whereHas('user', function($q) use ($search){
                        $q->where('name', 'LIKE' , "%{$search}%");
                    });
                })
                ->orWhere(function($q) use ($search){
                    $q->whereHas('partenaire', function($q) use ($search){
                        $q->where('name', 'LIKE' , "%{$search}%");
                    });
                })
                ->orWhere(function($q) use ($search){
                    $q->whereHas('status', function($q) use ($search){
                        $q->where('name', 'LIKE' , "%{$search}%");
                    });
                })
                ->orWhere(DB::raw("CONCAT(name, ' ', prenom)"), 'LIKE', "%{$search}%");
            });

            $this->datatable['recordsFiltered'] = $this->datatable['data']->count();
        }
    }

    protected function checkDateRange(){
        if($this->dateRange['start'] != '') {
            // check if created_at
            $created_at = $this->dateRange['created_at'] == 'true' ?
             $created_at = "created_at" : $created_at = "d_rv";

            // if rappel
             if($this->params['status_id'] == 3) {
                $created_at = "d_rappel";
             }


            $this->dateRange['end']  == '' ? $end = '2200-12-30' : $this->dateRange['end'] = $this->dateRange['end'];
            $start = Carbon::parse($this->dateRange['start']);
            $end = Carbon::parse($this->dateRange['end']);

            $this->datatable['data']->whereDate($created_at, '>=', $start)->whereDate($created_at, '<=', $end);

            $this->datatable['recordsFiltered'] = $this->datatable['data']->count();
        }
    }

    // get the data to display depends on the offset, limit and orderby
    protected function getTheOffset(){
        $this->datatable['data'] = $this->datatable['data']->offset($this->params['start'])
            ->limit($this->params['limit'])
            ->orderBy($this->params['order'], $this->params['dir'])
            ->with('status');
    }

}