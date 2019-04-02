<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractsRows extends Model
{
    use \App\Traits\Article;

    protected $table = 'contract_rows';

    public $timestamps = false;

    protected $fillable = [
        'contract_id',
        'article_id',
        'quantity',
        'price',
   	];
}
