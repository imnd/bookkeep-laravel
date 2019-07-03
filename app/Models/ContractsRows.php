<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Traits\Article;

class ContractsRows extends Model
{
    use Article;

    public $timestamps = false;

    protected $fillable = [
        'contract_id',
        'article_id',
        'quantity',
        'price',
   	];
}
