<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected  $guarded  = [];
    public function scopeSearch($query,$value){
        $query
        ->where('pagename','like',"%{$value}%");
        // ->where('name','like',"%{$value}%")
    }
}
