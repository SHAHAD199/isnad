<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CustomerResource extends JsonResource
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
           'id'              => $this->id,
           'name'            => $this->name,
           'phone'           => $this->phone,  
           'blocks'          => BlockResource::collection($this->whenLoaded('blocks')),
           'note'            => $this->whenPivotLoaded('block_customer', function(){
              return $this->pivot->note;
           }),
        
           'updated_by'      => $this->whenPivotLoaded('block_customer', function(){
            return $this->pivot->updated_by;
         }),
            
           'assistant'       => $this->whenPivotLoaded('block_customer', function(){
            return $this->pivot->assistant;
         }),

         
           'booking_date'    => $this->whenPivotLoaded('block_customer', function(){
            return $this->pivot->booking_date;
         }),
           'sale_date'       => $this->whenPivotLoaded('block_customer', function(){
            return $this->pivot->sale_date;
         }),
                  
           'img'             =>  $this->whenPivotLoaded('block_customer', function(){
              $img = ($this->pivot->img) ? asset('uploads/blocks/'. $this->pivot->img) :  "";
              return $img;
              }),
           
           'updated_at'      =>  $this->whenPivotLoaded('block_customer', function(){
            return $this->pivot->updated_at;
         }),
        ];

           
    }
}
