<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
      'name','description','user_id','address'
    ];
    public  function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
