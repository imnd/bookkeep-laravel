<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientsResource extends JsonResource
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
            'address' => $this->address,
            'region_id' => $this->region_id,
            'telephone' => $this->telephone,
            'fax' => $this->fax,
            'contact_fio' => $this->contact_fio,
            'contact_post' => $this->contact_post,
            'account' => $this->account,
            'bank' => $this->bank,
            'INN' => $this->INN,
            'KPP' => $this->KPP,
            'BIK' => $this->BIK,
            'sort' => $this->sort,
            'active' => $this->active,
            'region' => RegionsResource::collection(
                $this->whenLoaded('region')
            ),
        ];
    }
}
