<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Services\Factures\Models\Facture;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partenaire extends Model
{

    use SoftDeletes, Notifiable;

    public $fillable = ['name', 'desc', 'prix_fiche'];

    //Get the partenaire mails
    public function emails()
    {
        return $this->hasMany(PartenaireEmail::class);
    }

    public function fiches()
    {
        return $this->hasMany(Fiche::class);
    }

    public function fichesCibled()
    {
        return $this->fiches->where('d_cible', '!=', null);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function factureVide()
    {
        return $this->factures()->whereIn('status', ['vide', 'En Attente'])->get();
    }


    public function receivesBroadcastNotificationsOn()
    {
        return 'partenaire-'.$this->id;
    }

    // public function user()
    // {
    //     return $this->belongsToMany(User::class);
    // }
}
