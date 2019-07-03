<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public $timestamps = false;

    protected $table = 'articles';

    protected $fillable = [
    	'subcat_id', 'name', 'unit', 'price', 'active'
   	];

    /**
     * validation rules
     *
     * @return array
     */
    public static function getRules(): array
    {
        return [
            'subcat_id' => 'required|numeric',
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'unit' => 'required|max:2',
            'active' => 'numeric|min:1',
        ];
    }

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
        return $this->belongsTo('App\Models\ArticleSubcats', 'subcat_id');
    }
}
