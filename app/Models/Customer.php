<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone'];
    
 
    public function blocks()
    {
        return $this->belongsToMany(Block::class)->withPivot(['note','updated_by','assistant','booking_date','sale_date', 'block_id','img']);
    }
}
