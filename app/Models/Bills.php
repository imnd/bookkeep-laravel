<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bills extends Model
{
    public $timestamps = false;

    protected $table = 'bills';

    protected $fillable = [
        'client_id',
        'contract_num',
        'sum',
        'remainder',
        'date',
        'contents',
   	];

    protected $with = ['client'];

    protected $dates = ['date'];

    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Get the client.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients', 'client_id');
    }
}
