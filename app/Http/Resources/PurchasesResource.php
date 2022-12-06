<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchasesResource extends JsonResource
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
            'number' => $this->number,
            'sum' => $this->sum,
            'date' => $this->date,
            'rows' => PurchasesRowsResource::collection(
                $this->whenLoaded('rows')
            ),
        ];
    }
}
