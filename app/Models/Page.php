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
    }
    public function gallery(){
        return $this->hasMany(TextPageGalllery::class,'pagecode');
    }

    public function page_details(){
        return $this->hasMany(TextPagedetail::class,'pagecode');
    }
}
