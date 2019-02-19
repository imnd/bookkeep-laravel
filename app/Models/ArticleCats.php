<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCats extends Model
{
    protected $table = 'article_cats';

    protected $fillable = [
        'name',
    	'description',
   	];
}
