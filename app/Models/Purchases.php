<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows;

/**
 * Закупки
 */
class Purchases extends Model implements HasRows
{
    public $timestamps = false;

    protected $fillable = [
        'number',
        'sum',
        'date',
   	];

    /**
     * Get the purchase rows.
     */
    public function rows()
    {
        return $this->hasMany(PurchasesRows::class, 'purchase_id', 'id');
    }
}
