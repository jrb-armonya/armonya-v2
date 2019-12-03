<?php
namespace App\Services\Predictif\Http\Controllers\Societes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Services\Predictif\Models\Phone;
use App\Services\Predictif\Models\Societe;

class SocietesController extends Controller {

    public function __construct()
    {
        View::share('title', 'Predictif / Societe');
        $societesEnCours = Societe::where('inFile', 1)->get();
        View::share('societesEnCours', $societesEnCours);
    }

    public function store(Request $request)
    {
        ini_set('max_execution_time', 0);

        $validatedData = $request->validate([
            'name' => 'required|unique:societes|max:255',
            'adresse' => 'required',
            'phone' => 'numeric',
            'nbr' => 'numeric',
            'mode' => 'required|max:255'
        ]);

        // Societe name
        $name = $request->name;

        // Standard de la societe
        $adresse = $request->adresse;
        // Societe telephone principal
        $phone = intval(str_replace(' ', '', $request->num_phone));
        // nbr de numéros a générer
        $nbr = intval(str_replace(' ', '', $request->nbr));
        // asc ou desc
        $mode = $request->mode;

        

        // array of generated numbers
        $phones = [];

        // Creation de la nouvelle societe
        $societe = new Societe();
        $societe->name = $name;
        $societe->nbr_phones = $nbr;
        $societe->comment = "New Societe";
        $societe->adresse = $adresse;
        $societe->standard = $phone;
        $societe->save();

        // On insere le numero principal
        array_push($phones, $phone);
        // depend du mode 'asc' ou 'desc' on genere des numeros +1 
        // et on push dans le tableau $phones
        switch ($mode) {
            case 'asc':
                for ($i = 1; $i <= $nbr; $i++){
                    $phone += 1;

                    $phoneToCreate = Phone::create([
                        'nbr' => $phone, 
                        'used' => 0,
                        'societe_id' => $societe->id
                    ]);
                    // $phoneToCreate->nbr = $phone;
                    // $phoneToCreate->used = 0;
                    // $phoneToCreate->societe_id = $societe->id;
                    // $phoneToCreate->save();
                    
                    array_push($phones, $phone);
                }
                break;
            case 'desc':
                for ($i = 1; $i <= $nbr; $i++){
                    $phone -= 1;
                    $phoneToCreate = Phone::create([
                        'nbr' => $phone, 
                        'used' => 0,
                        'societe_id' => $societe->id
                    ]);
                    // $phoneToCreate = new Phone();
                    // $phoneToCreate->nbr = $phone;
                    // $phoneToCreate->used = 0;
                    // $phoneToCreate->societe_id = $societe->id;
                    // $phoneToCreate->save();
                    
                    array_push($phones, $phone);
                }
                break;
            default:
                break;
        }

        // on retourne le tableau des numeros
        return redirect()->back();

    }
    
    public function show($id){
        
        $societe = Societe::with('phones')->where('id', $id)->get();
        if(request()->ajax())
        {
            return $societe;
        }
        return view('predictif::societe.show', ['societe' => $societe[0]] );

    }
}