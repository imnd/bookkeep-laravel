<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractsRows extends Model
{
    protected $table = 'contracts_rows';

    protected $fillable = [
        'contract_id',
        'article_id',
   	];

    /**
     * Get the article.
     */
    public function article()
    {
        return $this->hasOne('App\Models\Articles', 'article_id');
    }
}
