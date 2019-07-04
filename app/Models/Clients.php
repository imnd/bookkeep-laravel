<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Rules\PhoneNumber;

class Clients extends Model
{
    public $timestamps = false;
    
    protected $table = 'clients';

    protected $fillable = [
    	'name', 'address', 'region_id', 'telephone', 'fax', 'contact_fio', 'contact_post', 'account', 'bank', 'INN', 'KPP', 'BIK', 'sort', 'active'
   	];

    protected $with = ['region'];

    /**
     * validation rules
     * 
     * @return array
     */
    public static function getRules()
    {
        return [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'bank' => 'required|max:255',
            'region_id' => 'required|numeric',
            'sort' => 'numeric',
            'active' => 'numeric|min:0|max:1',
            'telephone' => 'numeric|digits:10',
            'fax' => 'numeric|digits:10',
            'account' => 'numeric|digits:10',
            'INN' => 'numeric|digits:10',
            'KPP' => 'numeric|digits:10',
            'BIK' => 'numeric|digits:10',
            'contact_fio' => 'string|max:255',
            'contact_post' => 'string|max:255',
        ];
    }

    /**
     * Get the client region.
     */
    public function region()
    {
        return $this->hasOne('App\Models\Regions', 'id', 'region_id')->withDefault();
    }
}
