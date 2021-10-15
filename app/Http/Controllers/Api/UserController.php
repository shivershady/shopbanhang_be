<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(Request $request)
    {
        $users = User::create($request->all());

        $file = $request->file('img');
        $fileName = time() . $file->getClientOriginalName();
        $file->storeAs('/users', $fileName, 'public');

        $image = new Image();
        $image->imageable_id = $users->id;
        $image->imageable_type = User::class;
        $image->url = 'storage/users' . $fileName;
        $image->save();
    }

}
