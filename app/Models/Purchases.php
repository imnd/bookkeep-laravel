<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows;

class Purchases extends Model implements HasRows
{
    public $timestamps = false;

    protected $table = 'purchases';

    protected $fillable = [
        'number',
        'sum',
        'date',
   	];

    /**
     * validation rules
     * 
     * @return array
     */
    public static function getRules()
    {
        return [
            'number' => 'required|numeric',
            'sum' => 'numeric',
            'date' => 'required|date',
            'rows' => 'array',
        ];
    }

    # relations

    /**
     * Get the purchase rows.
     */
    public function rows()
    {
        return $this->hasMany(PurchasesRows::class, 'purchase_id', 'id');
    }
}
