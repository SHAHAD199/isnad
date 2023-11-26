<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'block_id',
        'cash_price',
        'first_payment',
        'second_payment',
        'third_payment',
        'fourth_payment',
        'fifth_payment',
        'sixth_payment',
        'seventh_payment',
        'eighth_payment',
        'ninth_payment',
        'tenth_payment',
        'eleventh_payment',
        'twelfth_payment',
        'thirteenth_payment',
        'fourteenth_payment',
        'fifteenth_payment',
        'sixteenth_payment',
        'seventeenth_payment',
        'total'
      ];



      public function block()
      {
        return $this->belongsTo(Block::class);
      }
}
