<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_address extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $fillable = [
      'address_line1','address_line2','city','province','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
