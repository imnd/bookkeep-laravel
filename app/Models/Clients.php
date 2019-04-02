<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public $timestamps = false;
    
    protected $table = 'clients';

    protected $fillable = [
    	'name', 'address', 'region_id', 'telephone', 'fax', 'contact_fio', 'contact_post', 'account', 'bank', 'INN', 'KPP', 'BIK', 'sort', 'active'
   	];

    protected $with = ['region'];

    /**
     * Get the client region.
     */
    public function region()
    {
        return $this->hasOne('App\Models\Regions', 'id', 'region_id')->withDefault();
    }

    /**
     * validation rules
     * 
     * @return array
     */
    public static function getRules()
    {
        return [
            'name,address' => 'required|max:255',
            'region_id' => 'required|numeric',
            'sort' => 'numeric|max:3',
            'active' => 'numeric|min:0',
            'telephone,fax,account' => 'min:10|max:10',
            'INN,KPP,BIK' => 'min:10|max:10',
            'contact_fio,contact_post' => 'string|max:255',
        ];
    }
}
