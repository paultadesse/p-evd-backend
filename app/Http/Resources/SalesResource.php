<?php

namespace App\Http\Resources;

use App\Http\Resources\DistributorResource;
use App\Http\Resources\SalesManagerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesResource extends JsonResource
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
            'sales_manager' => SalesManagerResource::make($this->whenLoaded('salesManager')),
            'distributors' => DistributorResource::collection($this->whenLoaded('distributors')),
        ];
        // return parent::toArray($request);
    }
}
