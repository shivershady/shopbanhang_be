<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statement extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $fillable = [
        'is_sub','amount', 'status', 'order_id'
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
