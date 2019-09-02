<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    Carbon\Carbon,
    App\Traits\Client;

class Bills extends Model
{
    use Client;

    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'contract_num',
        'sum',
        'remainder',
        'date',
        'contents',
   	];

    protected $with = ['client'];

    /*protected $dates = ['date'];

    public function getDates()
    {
        return $this->dates;
    }*/
}
