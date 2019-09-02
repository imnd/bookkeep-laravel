<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public $timestamps = false;

    protected $fillable = [
    	'subcat_id', 'name', 'unit', 'price', 'active'
   	];

    /**
     * @return array
     */
    public static function getUnits(): array
    {
        return ['кг', 'шт'];
    }

    /**
     * @return array
     */
    public function getActiveReadable()
    {
        return ['нет', 'да'][$this->active];
    }

    /**
     * Get the subcategory.
     */
    public function subcategory()
    {
        return $this->belongsTo(ArticleSubcats::class, 'subcat_id');
    }
}
