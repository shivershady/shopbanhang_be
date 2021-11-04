<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Shop;
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
            $id = Auth::id();
            $data = $request->all();
            User::find($id)->update($data);

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
            return response()->json(['message', 'cập nhật thông tin thất bại'], 500);
        }
        return response()->json(['message', 'cập nhật thông tin thành công'], 200);
    }


    public function addShop(Request $request)
    {
        try {
            DB::beginTransaction();
            $id = Auth::id();
            $data = $request->all();
            $data['user_id'] = $id;
            $shop = Shop::create($data);

            $file = $request->file('img');
            $fileName = time() . $file->getClientOriginalName();
            $file->storeAs('/users', $fileName, 'public');

            $image = new Image();
            $image->imageable_id = $shop->id;
            $image->imageable_type = Shop::class;
            $image->url = 'storage/shops/' . $fileName;
            $image->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message', 'thêm thất bại'], 500);
        }
        return response()->json(['message', 'thêm thành công'], 200);

    }

    public function upDateShop()
    {
        try {
            DB::beginTransaction();

DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([]);
        }
    }

}
