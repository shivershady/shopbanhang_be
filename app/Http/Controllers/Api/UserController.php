<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function add(Request $request ,$id)
    {
        try {
            $data = request()->all();
            $users =
            $file = $request->file('img');
            $fileName = time() . $file->getClientOriginalName();
            $file->storeAs('/users', $fileName, 'public');

            $image = new Image();
            $image->imageable_id = $users->id;
            $image->imageable_type = User::class;
            $image->url = 'storage/users' . $fileName;
            $image->save();
        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'thêm thất bại'
            ]);
        }
        return response()->json([
           'status'=>200,
           'message'=>'thêm thành công'
        ]);
    }

}
