<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractRowResource extends JsonResource
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
            'quantity' => $this->quantity,
            'price' => $this->price,
            'article' => ArticleResource::collection(
                $this->whenLoaded('article')
            ),
            'contract' => ContractResource::collection(
                $this->whenLoaded('contract')
            ),
        ];
    }
}
