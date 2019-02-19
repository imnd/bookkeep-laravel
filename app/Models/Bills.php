<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bills extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'client_id',
        'contract_num',
        'sum',
        'remainder',
        'contents',
        'date',
   	];

    protected $dates = ['date'];

    public function getDates()
    {
        return $this->dates;
    }
}
