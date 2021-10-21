<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->user();
            $data = $request->all();
            User::find($id->id)->update($data);
            $image = Image::all();
            foreach ($image as $img) {
                $img = Image::find($img->id);
                if ($img) {
                    Storage::disk('local')->delete($img->url);
                    $img->forceDelete();
                }
            }
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
            'status' => 200,
            'message' => 'cập nhật thông tin thành công'
        ]);
    }

    public function updateShop(Request $request)
    {
        $request->validate([
            'address_line1'=>'required',
            'city'=>'required',
            'province'=>'required',
            'description'=>'required'
        ]);
        try {

            $id = $request->user();
            $user_address = new User_address();
            $user_address->user_id = $id->id;
            $user_address->city = $request->city;
            $user_address->province = $request->province;
            $user_address->address_line1 = $request->address_line1;
            $user_address->address_line2 = $request->address_line2;
            $user_address->save();

        } catch (Exception $e) {

            return response()->json([
                'status' => 400,
                'message' => 'thêm thất bại'
            ]);

        }

        return response()->json([
            'status' => 200,
            'message' => 'thêm thành công'
        ]);
    }

}
