<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = ['name' , 'phone', 'password', 'role_id'];


    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);
    }
    

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    public function role()
    {
       return $this->belongsTo(Role::class);
    }

}
