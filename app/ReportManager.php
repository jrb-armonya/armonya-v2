<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportManager extends Model
{
    /**
     * talbe name
     *
     * @var string
     */
    protected $table = 'reports';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'fiche_id'];

    /**
     * User relation
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Fiche relations
     *
     * @return BelongsTo
     */
    public function fiche()
    {
        return $this->belongsTo(Fiche::class);
    }
}
