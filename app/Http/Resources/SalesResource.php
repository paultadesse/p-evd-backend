<?php

namespace App\Http\Resources;

use App\Http\Resources\SalesResource;
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
            'sales_manager' => SalesResource::make($this->whenLoaded('salesManager')),
        ];
        // return parent::toArray($request);
    }
}
