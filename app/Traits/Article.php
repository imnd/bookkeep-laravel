<?php
namespace App\Traits;

use App\Models\Articles;

trait Article
{
    /**
     * Get the article.
     */
    public function article()
    {
        return $this->hasOne(Articles::class, 'article_id');
    }
}
