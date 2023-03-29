<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','is_active'];
    public function price(){
        return $this->hasOne(Price::class , 'service_id' , 'id');
    }
    public function appoiments(){
        return $this->hasMany(Appoiment::class);
    }

}
