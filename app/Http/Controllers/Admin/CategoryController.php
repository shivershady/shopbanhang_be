<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class CategoryController extends Controller implements ICRUD
{
    public function list()
    {
        $list = Category::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.category.list', compact('list'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('be.category.add', compact('categories'));
    }

    public function doAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'total_product' => 'required',
        ]);

        $files = $request->file('img');
        if (!$files || count($files) == 0) {
            return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một hình ảnh');
        }

        try {
            DB::beginTransaction();

            $data = request()->except(['_token', 'img']);
            $category = Category::create($data);

            for ($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                //upload từng file
                $fileName = time() . $i . $file->getClientOriginalName();
                $file->storeAs('/category', $fileName, 'public');
                //chèn vào bảng image
                $image = new Image();
                $image->imageable_id = $category->id;
                $image->imageable_type = Category::class;
                $image->url = 'storage/category/' . $fileName;
                $image->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'thêm thất bại');
        }

        return redirect(route('admin.category.list'))->with('success', 'Thêm thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Category::find($id);
        $categories = Category::all();
        return view('be.category.edit', compact('obj', 'categories'));

    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'total_product' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = request()->except(['_token', 'img','removeImages']);
            Category::where('id', $id)->update($data);

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
                    $file->storeAs('/category', $fileName, 'public');
                    //chèn vào bảng image
                    $image = new Image();
                    $image->imageable_id = $id;
                    $image->imageable_type = Category::class;
                    $image->url = 'storage/category/' . $fileName;
                    $image->save();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
        return redirect(route('admin.category.list'))->with('success', 'Sửa thành công');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Category::where('id', $id)->delete();
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
        $list = Category::where('name', 'LIKE', '%' . $q . '%')->orWhere('slug', 'LIKE', '%' . $q . '%')->orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.category.list', compact('list'));
    }

    public function filter(Request $request)
    {
        // TODO: Implement filter() method.
        $filter = $request->filter;
        switch ($filter) {
            case 'DESC':
                $list = Category::orderBy('id', 'DESC')->paginate($this->paginateItems);
                return view('be.category.list', compact('list'));

            case 'ASC':
                $list = Category::orderBy('id', 'ASC')->paginate($this->paginateItems);
                return view('be.category.list', compact('list'));
            case 'a-z':
                $list = Category::orderBy('name', 'ASC')->paginate($this->paginateItems);
                return view('be.category.list', compact('list'));
            case 'z-a':
                $list = Category::orderBy('name', 'DESC')->paginate($this->paginateItems);
                return view('be.category.list', compact('list'));

        }
    }
}
