<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\QueryConditions;

class Articles extends Model implements QueryConditions
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
     * @return string
     */
    public static function getUnitsList(): string
    {
        return implode(',', self::getUnits());
    }

    /**
     * @return string
     */
    public function getActiveReadable(): string
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

    /**
     * @inheritdoc
     */
    public static function getSearchConditions(array $params): array
    {
        $conditions = array();
        if (!empty($params['priceFrom'])) {
            $conditions[] = array('price', '>=', addslashes($params['priceFrom']));
        }
        if (!empty($params['priceTo'])) {
            $conditions[] = array('price', '<=', addslashes($params['priceTo']));
        }
        if (!empty($params['name'])) {
            $conditions[] = array('name', 'LIKE', '%' . addslashes($params['name']). '%');
        }
        foreach (['subcat_id', 'unit', 'active'] as $field) {
            if (isset($params[$field]) && $params[$field]!=='') {
                $conditions[] = array($field, '=', addslashes($params[$field]));
            }
        }
        return $conditions;
    }
}
