<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows;

class Purchases extends Model implements HasRows
{
    protected $table = 'purchases';

    protected $fillable = [
        'number',
        'date',
        'sum'
   	];

    # relations

    /**
     * Get the purchase rows.
     */
    public function rows()
    {
        return $this->hasMany('App\Models\PurchasesRows', 'purchase_id', 'id');
    }
}
