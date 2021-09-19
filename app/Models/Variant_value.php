<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant_value extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
      'name','price','variant_id'
    ];
    public function variant(){
        return $this->belongsTo(Variant::class);
    }
}
