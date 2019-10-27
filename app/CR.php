<?php

/**
 * Compte Rendu
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class CR extends Model
{
    protected $table = 'crs';
    protected $fillable = ['id', 'fiche_id', 'partenaire_id', 'cr'];

    public function fiche()
    {
        return $this->belongsTo(Fiche::class);
    }

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
}
