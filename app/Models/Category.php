<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
      'name','slug','parent_id','status','total_product',
    ];
    public function parentCategory(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }
    public  function images(){
        return $this->morphMany(Image::class,'imageable');
    }
}
