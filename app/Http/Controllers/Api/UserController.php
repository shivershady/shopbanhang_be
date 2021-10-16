<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $id =  $request->user();
            $data = $request->all();
             User::find($id->id)->update($data);
            $file = $request->file('img');
            //upload từng file
            $fileName = time() . $file->getClientOriginalName();
            $file->storeAs('/users', $fileName, 'public');
            //chèn vào bảng image
            $image = new Image();
            $image->imageable_id = $id->id;
            $image->imageable_type = User::class;
            $image->url = 'storage/users/' . $fileName;
            $image->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 400,
                'message' => 'cập nhật thông tin thất bại'
            ]);
        }
        return response()->json([
           'status'=>200,
           'message'=>'cập nhật thông tin thành công'
        ]);
    }

}
