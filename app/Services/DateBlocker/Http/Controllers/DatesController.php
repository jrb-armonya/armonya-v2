<?php 
namespace App\Services\DateBlocker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Services\DateBlocker\Models\Date;

/**
 * DateController
 * 
 * show all the blocked dates with the store form
 * store a date
 * delete a date
 * 
 */
class DatesController extends Controller{

    /**
     * $model
     *
     * @var undefined
     */
    protected $model;

    /**
     * __construct
     *
     * @param Date $date
     * @return void
     */
    public function __construct(Date $date)
    {
        View::share('title', 'Bloquer des Dates');
        $this->model = $date;
    }

    /**
     * index
     *  on utilise l'ajax a l'interieur du datepicker de la date du rendez-vous 
     *  et la date du rappel
     * 
     * @return void
     */
    public function index()
    {
        $dates = $this->model->all();

        if(request()->ajax()){
            return response()->json($dates);
        }
        return view('dateblocker::index', compact('dates'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $date = $request->date;
        $newDate = new Date;
        $newDate->date = Carbon::createFromFormat('d/m/Y', $date);
        $newDate->save();
        return $this->index();
    }

    /**
     * destroy
     *
     * @param mixed $id
     * @return void
     */
    public function destroy($id)
    {
        Date::find($id)->delete();
        return $this->index();
    }
}