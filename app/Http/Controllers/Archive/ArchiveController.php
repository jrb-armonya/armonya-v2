<?php

namespace App\Http\Controllers\Archive;

use App\Fiche;
use App\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    public function putCibles($data ,$parts)
    {
        Fiche::find($data['data']['id'])->update([
            'is_archived' => 1 
        ]);
        foreach($parts as $part){
            Action::create([
                'user_id' => request()->user()->id,
                'action' => 'partenaire archive',
                'new_status' => 7,
                'old_status' => 6,
                'partenaire_id' => $part,
                'fiche_id' => $data['data']['id']
            ]);
        }
    }
}
