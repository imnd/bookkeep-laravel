<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'contract_num' => $this->contract_num,
            'number' => $this->number,
            'sum' => $this->sum,
            'payed' => $this->payed,
            'date' => $this->date,
            'rows' => InvoiceRowResource::collection(
                $this->whenLoaded('rows')
            ),
            'client' => ClientResource::collection(
                $this->whenLoaded('client')
            ),
        ];
    }
}
