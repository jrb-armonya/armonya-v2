<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartenaireEmail extends Model
{
    public $fillable = ['email', 'partenaire_id', 'user_id'];


    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
