<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Shop;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $data = request()->except('password');
            User::find($id)->update($data);
            $image = Image::where('imageable_id', $id)
                ->where('imageable_type', User::class)
                ->get();
            if ($image->count() > 0) {
                foreach ($image as $item) {
                    Storage::disk('public')->delete($item->url);
                    $item->forceDelete();
                }
            }
            $file = $request->file('img');
            $fileName = time() . $file->getClientOriginalName();
            $file->storeAs('/users', $fileName, 'public');
            //chèn vào bảng image
            $image = new Image();
            $image->imageable_id = $id;
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

    public function updateShop()
    {
        try {
            $id = Auth::id();
            User_address::where('user_id', $id)->update(request()->all());
        } catch (Exception $e) {
            response()->json(['message', 'cập nhật thông tin thất bại'], 500);
        }
        return response()->json(['message', 'cập nhật thông tin  thành công'], 200);
    }

    public function listShop()
    {
        $id = Auth::id();
        $shop = User_address::where('user_id', $id)->get();
        return response()->json($shop, 200);
    }

}

