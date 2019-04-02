<?php
namespace App\Traits;

trait Article
{
    /**
     * Get the article.
     */
    public function article()
    {
        return $this->hasOne('App\Models\Articles', 'article_id');
    }
}
