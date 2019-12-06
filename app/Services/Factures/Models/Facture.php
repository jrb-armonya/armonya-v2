<?php

namespace App\Services\Factures\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model {

    /**
     * $fillable
     *
     * @var array
     */
    protected $fillable = ['partenaire_id', 'status', 'amount', 'pdf_id', 'type'];

    /**
     * $dates
     *
     * @var array
     */
    protected $dates = ['date_payement'];

    /**
     * fiches
     *
     * @return void
     */
    public function fiches() {
        return $this->hasMany('App\Fiche');
    }

    /**
     * partenaire
     *
     * @return void
     */
    public function partenaire() {
        return $this->belongsTo('App\Partenaire');
    }

    /**
     * amount
     *
     * @return void
     */
    public function amount() {
        return $this->partenaire->prix_fiche  * $this->fiches->count();
    }
}
