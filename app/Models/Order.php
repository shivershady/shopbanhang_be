<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $fillable = [
       'total','sub_total','status','payment_type','warranty'
    ];
    public  function user(){
      return   $this->belongsTo(User::class);
    }
    public function statement(){
        return $this->hasOne(Statement::class);
    }

}
