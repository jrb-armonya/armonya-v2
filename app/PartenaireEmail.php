<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartenaireEmail extends Model
{
    public $fillable = ['email', 'partenaire_id'];
}
