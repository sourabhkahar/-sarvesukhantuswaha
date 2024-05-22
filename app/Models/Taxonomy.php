<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    use HasFactory;

    public function scopeSearch($query,$value){
        $query
        ->where('title','like',"%{$value}%");
        // ->where('name','like',"%{$value}%")
    }
}
