<?php
namespace App\Transformers;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends  TransformerAbstract {

    public function transform(User $user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone'=>$user->phone,
            'password'=>$user->password,
            'email_verified_at'=>$user->email_verified_at,
            'user_seller'=>$user->user_seller,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'url'=>$user->image?asset($user->image->url):'http://windows79.com/wp-content/uploads/2021/02/Thay-the-hinh-dai-dien-tai-khoan-nguoi-dung-mac.png',
        ];
    }

}
