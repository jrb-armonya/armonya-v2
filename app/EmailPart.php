<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmailPart extends Model
{
	use SoftDeletes;
    protected $table = 'emailparts';
}
