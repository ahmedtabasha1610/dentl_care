<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoiment extends Model
{
    use HasFactory;
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
