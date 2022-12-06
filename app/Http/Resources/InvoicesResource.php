<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
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
            'client_id' => $this->client_id,
        ];
    }
}
