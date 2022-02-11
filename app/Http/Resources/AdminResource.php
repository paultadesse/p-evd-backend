<?php

namespace App\Http\Resources;

use App\Http\Resources\SuperAdminResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $super_admin = $this->whenLoaded('superAdmin');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'super_admin' => SuperAdminResource::make($this->whenLoaded('superAdmin')),
        ];
        return parent::toArray($request);
    }
}
