<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public $fillable = [
        'fiche_id', 'user_id', 'partenaire_id', 'new_status', 'old_status',
        'action'
    ];

    public function oldStatus() {
        return $this->belongsTo('App\Status', 'old_status', 'id');
    }

    public function newStatus() {
        return $this->belongsTo('App\Status', 'new_status', 'id');
    }
    public function user() {
        return $this->belongsTo('App\User')->withTrashed();
    }
    public function fiche() {
        return $this->belongsTo('App\Fiche');
    }

    public function partenaire(){
        return $this->belongsTo('App\Partenaire');
    }
  
}
