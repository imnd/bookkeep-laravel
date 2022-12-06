<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractsResource extends JsonResource
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
            'sum' => $this->sum,
            'payed' => $this->payed,
            'date' => $this->date,
            'term_start' => $this->term_start,
            'term_end' => $this->term_end,
            'type' => $this->type,
            'rows' => ContractsRowsResource::collection(
                $this->whenLoaded('rows')
            ),
            'client' => ClientsResource::collection(
                $this->whenLoaded('client')
            ),
        ];
    }
}
