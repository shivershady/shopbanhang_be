<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name','slug','category_id','quantity','user_id',
        'price','discount_id','active','iHot','iPay','warranty','view',
        'description','description_seo','title_seo','content','keyword_seo',
    ];
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function discount(){
        return $this->belongsTo(Discount::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }

}
