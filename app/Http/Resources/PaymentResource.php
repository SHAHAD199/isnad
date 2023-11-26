<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'id'                   => $this->id,
            'cash_price'           => $this->cash_price,
            'first_payment'        => $this->first_payment,
            'second_payment'       => $this->second_payment,
            'third_payment'        => $this->third_payment,
            'fourth_payment'       => $this->fourth_payment,
            'fifth_payment'        => $this->fifth_payment,
            'key_receiving'        => $this->sixth_payment,
            'seventh_payment'      => $this->seventh_payment,
            'eighth_payment'       => $this->eighth_payment,
            'ninth_payment'        => $this->ninth_payment,
            'tenth_payment'        => $this->tenth_payment,
            'eleventh_payment'     => $this->eleventh_payment,
            'twelfth_payment'      => $this->twelfth_payment,
            'thirteenth_payment'   => $this->thirteenth_payment,
            'fourteenth_payment'   => $this->fourteenth_payment,
            'fifteenth_payment'    => $this->fifteenth_payment,
            'sixteenth_payment'    => $this->sixteenth_payment,
            'seventeenth_payment'  => $this->seventeenth_payment,
            'total'                => $this->total,

        ];
    }
}
