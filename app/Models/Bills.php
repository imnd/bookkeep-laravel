<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    Carbon\Carbon;

class Bills extends Model
{
    use \App\Traits\Client;

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

    //protected $dates = ['date'];

    //public function getDates()
    //{
       // return $this->dates;
    //}

    /**
     * validation rules
     * 
     * @return array
     */
    public static function getRules()
    {
        return [
            'client_id' => 'required|numeric',
            'contract_num' => 'required|numeric',
            'sum' => 'numeric',
            'remainder' => 'numeric',
            'date' => 'date',
            'contents' => 'string',
        ];
    }
}
