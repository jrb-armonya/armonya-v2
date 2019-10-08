<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Factures\Models\Facture;

class Partenaire extends Model
{

    use SoftDeletes;
    
    public $fillable = ['name', 'desc', 'prix_fiche'];

    //Get the partenaire mails
    public function emails() {
        return $this->hasMany(PartenaireEmail::class);
    }

    public function fiches() {
        return $this->hasMany(Fiche::class);
    }

    public function fichesCibled() {
        return $this->fiches->where('d_cible', '!=', null);
    }

    public function factures(){
        return $this->hasMany(Facture::class);
    }

    public function factureVide(){
        return $this->factures()->whereIn('status', ['vide', 'En Attente'])->get();
    }
}
