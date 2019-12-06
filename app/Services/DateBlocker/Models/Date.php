<?php 
namespace App\Services\DateBlocker\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model {

    protected $fillable = ['date'];
    
    protected $dates = ['date'];

}