<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'remainder' => $this->remainder,
            'date' => $this->date,
            'contents' => $this->contents,
            'client' => ClientResource::collection(
                $this->whenLoaded('client')
            ),
        ];
    }
}
