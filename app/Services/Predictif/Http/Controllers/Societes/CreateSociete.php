<?php
namespace App\Services\Predictif\Http\Controllers\Societes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Predictif\Repositories\Phones\PhoneRepository;
use App\Services\Predictif\Repositories\Societes\SocieteRepository;

class CreateSociete extends Controller {

    protected $societe;
    
    public function __construct(SocieteRepository $societe, PhoneRepository $phone)
    {
        ini_set('max_execution_time', 0);
        $this->societe = $societe;
        $this->phone = $phone;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:societes|max:255',
            'adresse' => 'required',
            'standard' => 'required|size:13',
            'nbr' => 'numeric',
            'mode' => 'required|max:255'
        ]);

        $params = [
            'name' => $request->name,
            'adresse' => $request->adresse,
            'standard' => intval(str_replace(' ', '', $request->standard)),
            'nbr_phones' => intval(str_replace(' ', '', $request->nbr)),
            'comment' => '-- commentaire --'
        ];

        $societe = $this->societe->create($params);

        $mode = $request->mode;

        $phones = $this->generateNumbers($params, $mode, $societe);

        return redirect()->back();
    }

    /**
     * generateNumbers
     *
     * @param mixed $params
     * @param mixed $mode
     * @param mixed $societe
     * @return void
     */
    protected function generateNumbers($params, $mode, $societe){
        $phones = [];
        array_push($phones, $params['standard']);
        $phone = $params['standard'];
        switch ($mode) {
            case 'asc':
                for ($i = 1; $i <= $params['nbr_phones']; $i++){
                    $phone += 1;
                    $this->phone->create(['nbr' => $phone, 'used' => 0, 'societe_id' => $societe->id]);
                    array_push($phones, $phone);
                }
                break;
            case 'desc':
                for ($i = 1; $i <= $params['nbr_phones']; $i++){
                    $phone -= 1;
                    $this->phone->create(['nbr' => $phone, 'used' => 0, 'societe_id' => $societe->id]);
                    array_push($phones, $phone);
                }
                break;
            default:
                break;
        }

        return $phones;
    }
}