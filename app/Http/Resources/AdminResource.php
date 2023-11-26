<?php

namespace App\Http\Resources;

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
        $arr = [
           'id'     => $this->id,
           'name'   => $this->name,
           'phone'  => $this->phone,
        ];
        
          if ($this->relationLoaded('role')) {
         $arr = array_merge($arr, [
            'role'  => new RoleResource($this->whenLoaded('role'))
        ]);
         }
         
         return $arr;
    }
}
