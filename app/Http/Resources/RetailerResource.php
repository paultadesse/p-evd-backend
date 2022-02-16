<?php

namespace App\Http\Resources;

use App\Http\Resources\DistributorResource;
use App\Http\Resources\SubDistributorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RetailerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'distributor' => DistributorResource::make($this->whenLoaded('distributor')),
            'sub_distributor' => SubDistributorResource::make($this->whenLoaded('subDistributor')),
        ];
        // return parent::toArray($request);
    }
}
