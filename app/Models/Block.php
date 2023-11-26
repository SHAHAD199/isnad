<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable = ['block' , 'section_id','number', 'title', 'area', 'status'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
    public function customers()
    {
        return $this->belongsToMany(Customer::class)->withPivot(['note','updated_by','assistant','booking_date','sale_date', 'block_id','img']);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
