<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $arr =  [
            'id'                 => $this->id,
            'name'               => $this->name,
            'permission_ids'     =>  $this->when(!$request->routeIs('admins.*') , function(){
                DB::table('permission_role')->where('role_id', $this->id)->pluck('id');
            }), 
            
            'permission_count'   => $this->when(!$request->routeIs('admins.*') , function(){
            DB::table('permission_role')->where('role_id', $this->id)->get()->count();
            }), 
            
            
            
        ];
        
        
         if ($this->relationLoaded('permissions')) {
         $arr = array_merge($arr, [
            'permissions'           => PermissionResource::collection($this->whenLoaded('permissions'))
        ]);
        
        
        
     }
     
     return $arr;
     
    }
}
