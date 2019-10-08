<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailPartenaire extends Model
{
	use SoftDeletes;
	
    protected $table = 'partenaire_emails';

    public function partenaire()
    {
        return $this->belongsTo('\App\Partenaire', 'partenaire_id');
    }
}
