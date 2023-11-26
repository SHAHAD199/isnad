<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class BlockResource extends JsonResource
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
            'id'             => $this->id,
            'number'         => $this->number,
            'block'          => $this->block,
            'section'        => $this->section->name,
            'title'          => $this->title,
            'area'           => $this->area,
            'status'         => DB::table('blocks')->where('id', $this->id)->first()->status,
            'customers'      => CustomerResource::collection($this->whenLoaded('customers')),
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

        if ($this->relationLoaded('payment')) {
         $arr = array_merge($arr, [
            'payments'           => new PaymentResource($this->whenLoaded('payment'))
        ]);
      }
         return $arr;
    }
}
