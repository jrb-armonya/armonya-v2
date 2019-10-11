<?php

namespace App\Http\Controllers\Rapports;

use App\Fiche;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RapportJplusController extends Controller
{
    public function index()
    {
		$date = Carbon::now()->format("d/m/Y");
          		
		$title ="Stats J+ du " . $date;

		$resultat = $this->getJPlusStats(date('d'), date('m'), date('Y'));

      	return view('app.rapports.jPlus.index',compact('resultat', 'title','date'));
    }


	public function searchByDate(Request $request)
	{
		$title = "Stats J+ du $request->date";

		$date = $request->date;

		$dateArray = explode('-', $request->date);

		$resultat = $this->getJPlusStats($dateArray[0], $dateArray[1], $dateArray[2]);

 		return view('app.rapports.jPlus.index',compact('resultat', 'title','date'));
	}

	private function getJPlusStats($d, $m, $y)
	{	
		$fiches = Fiche::whereMonth('created_at', $m)
			->whereYear('created_at', $y)
			->whereHas('user', function($q){
				$q->where('role_id', 2);
			})
			->where('status_id', '!=', 29);

		$fichesMonth = $fiches->get();
		
		$fichesToday = $fiches->whereDay('created_at', $d)->get();

		return ['day' => $this->calcMoy($fichesToday),  'month' => $this->calcMoy($fichesMonth)];
	}

	private function calcMoy($fiches)
	{
		$totalDiff = 0;

		foreach($fiches as $f) {
			$totalDiff += $f->created_at->diff($f->d_rv)->days;
		}

		return $totalDiff / max(1, $fiches->count());
	}
}
