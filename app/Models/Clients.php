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
        return $this->hasOne('App\Models\Regions', 'id', 'region_id');
    }
}
