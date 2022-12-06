<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticlesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'unit' => $this->unit,
            'price' => $this->price,
            'active' => $this->active,
            'subcat_id' => $this->subcat_id,
            'subcategory' => ArticleSubcatsResource::collection(
                $this->whenLoaded('subcategory')
            ),
        ];
    }
}
