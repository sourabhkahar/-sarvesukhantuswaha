<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtmlBlock extends Model
{
    use HasFactory;
    protected  $guarded  = [];
    public function scopeSearch($query,$value){
        $query
        ->where('blockname','like',"%{$value}%");
        // ->where('name','like',"%{$value}%")
    }
}
