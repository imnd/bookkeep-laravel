<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
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
    public static function getRules()
    {
        return [
            'subcat_id' => 'required|numeric',
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'unit' => 'required|max:3',
            'active' => 'min:0|numeric',
        ];
    }

    /**
     * @return array
     */
    public static function getUnits(): array
    {
        return array('кг', 'шт');
    }

    /**
     * @return array
     */
    /*public function getActiveReadable()
    {
        return ['нет', 'да'][$this->active];
    }*/

    /**
     * Get the subcategory.
     */
    public function subcategory()
    {
        return $this->belongsTo('App\Models\ArticleSubcats', 'subcat_id');
    }
}
