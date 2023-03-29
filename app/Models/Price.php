<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = ['service_id','image','price'];

    public function service(){
        return $this->belongsTo(Service::class , 'service_id' , 'id');
    }
}
