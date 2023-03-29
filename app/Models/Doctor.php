<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name','image',];

    public function category(){
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }
    public function appoiments(){
        return $this->hasMany(Appoiment::class);
    }
}
