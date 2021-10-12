<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class UserController extends Controller implements ICRUD
{
    public function list()
    {
        $list = User::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.user.list', compact('list'));
    }

    public function add()
    {
        return view('be.user.add');
    }

    public function doAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required|min:10',
            'user_seller' => 'required'
        ]);

        $files = $request->file('img');
        if (!$files || count($files) == 0) {
            return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một hình ảnh');
        }

        try {
            DB::beginTransaction();
            $data = request()->except(['_token','img']);
            $data['password'] = bcrypt($request->password);
          $user =   User::create($data);

            for ($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                //upload từng file
                $fileName = time() . $i . $file->getClientOriginalName();
                $file->storeAs('/products', $fileName, 'public');
                //chèn vào bảng image
                $image = new Image();
                $image->imageable_id = $user->id;
                $image->imageable_type = User::class;
                $image->url = 'storage/products/' . $fileName;
                $image->save();
            }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'thêm thất bại');
        }

        return redirect(route('admin.user.list'))->with('success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $obj = User::find($id);
        // TODO: Implement edit() method.
        return view('be.user.edit', compact('obj'));
    }

    public function doEdit($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'phone' => 'required|min:10',
            'user_seller' => 'required'
        ]);
        // TODO: Implement doEdit() method.
        try {

            $data = request()->except(['_token','img','removeImages']);
            $data['password'] = Hash::make($data['password']);
            User::where('id', $id)->update($data);


            $removeImages = $request->removeImages;
            if ($removeImages && $removeImages != "") {
                //convert removeImages thành mảng
                $removeImages = explode("|", $removeImages);
                // dd($removeImages);
                foreach ($removeImages as $removeImageId) {
                    //Xoá ảnh trong storage đi
                    //Xoá dữ liệu ảnh trong DB
                    $image = Image::find($removeImageId);
                    if ($image) {
                        Storage::disk('local')->delete($image->path);//xoả ảnh trong storage
                        $image->forceDelete();//xoá dữ liệu ảnh trong DB
                    }
                }
            }

            $files = $request->file('img');
            if ($files && count($files) != 0) {
                for ($i = 0; $i < count($files); $i++) {
                    $file = $files[$i];
                    //upload từng file
                    $fileName = time() . $i . $file->getClientOriginalName();
                    $file->storeAs('/products', $fileName, 'public');
                    //chèn vào bảng image
                    $image = new Image();
                    $image->imageable_id = $id;
                    $image->imageable_type = User::class;
                    $image->url = 'storage/products/' . $fileName;
                    $image->save();
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
        return redirect(route('admin.user.list'))->with('success', 'Sửa thành công');

    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            User::where('id', $id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xoá thất bại');
        }
        return redirect()->back()->with('success', 'Xoá thành công');
    }

    public function search(Request $request)
    {
        // TODO: Implement search() method.
        $q = $request->q;
        // TODO: Implement list() method.
        $list = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->orWhere('phone','LIKE','%'. $q . '%')->orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.user.list', compact('list'));
    }

    public function filter(Request $request)
    {
        $filter = $request->filter;
        switch ($filter){
            case 'DESC':
                $list = User::orderBy('id', 'DESC')->paginate($this->paginateItems);
                return view('be.user.list', compact('list'));

            case 'ASC':
                $list = User::orderBy('id', 'ASC')->paginate($this->paginateItems);
                return view('be.user.list', compact('list'));
            case 'a-z':
                $list = User::orderBy('name', 'ASC')->paginate($this->paginateItems);
                return view('be.user.list', compact('list'));
            case 'z-a':
                    $list = User::orderBy('name', 'DESC')->paginate($this->paginateItems);
                    return view('be.user.list', compact('list'));
        }
    }

}
