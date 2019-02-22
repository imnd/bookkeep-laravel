<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contracts extends Model
{
    public $timestamps = false;

    protected $table = 'contracts';

    protected $fillable = [
        'contract_num',
        'client_id',
        'sum',
        'payed',
        'date',
        'term_start',
        'term_end',
        'type',
   	];

    protected $dates = ['date', 'term_start', 'term_end'];

    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Get the article.
     */
    public function client()
    {
        return $this->hasOne('App\Models\Clients', 'client_id');
    }
}
