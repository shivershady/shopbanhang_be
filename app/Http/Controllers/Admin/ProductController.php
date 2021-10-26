<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Exception;

class ProductController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Product::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.product.list', compact('list'));
    }

    public function add()
    {

    }

    public function doAdd(Request $request)
    {

    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Product::find($id);
        $categories = Category::all();
        $discounts = Discount::all();
        return view('be.product.edit', compact('obj', 'discounts', 'categories'));
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        $request->validate([
            'name' => 'required', 'slug' => 'required', 'category_id' => 'required',
            'quantity' => 'required', 'price' => 'required', 'discount_id' => 'required',
            'active' => 'required', 'iHot' => 'required', 'iPay' => 'required',
            'warranty' => 'required', 'view' => 'required', 'description' => 'required'
        ]);
        try {

            DB::beginTransaction();
            $data = request()->except('_token', 'img','removeImages');
            Product::where('id', $id)->update($data);


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
                        Storage::disk('local')->delete($image->url);//xoả ảnh trong storage
                        $image->forceDelete();//xoá dữ liệu ảnh trong DB
                    }
                }
            }

            //chèn vào bảng image
            //upload image
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
                    $image->imageable_type = Product::class;
                    $image->url = 'storage/products/' . $fileName;
                    $image->save();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','sửa thất bại');
          //  echo $e->getMessage();
        }
        return redirect(route('admin.product.list'))->with('success','sửa thành công');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Product::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'xóa thất bại');
        }
        return redirect()->back()->with('success', 'xóa thành công');
    }
      public function search(Request $request)
      {
          // TODO: Implement search() method.
          $q = $request->q;
          // TODO: Implement list() method.
          $list = Product::where('name', 'LIKE', '%' . $q . '%')->orWhere('content', 'LIKE', '%' . $q . '%')->orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
          return view('be.product.list', compact('list'));
      }

    public function filter(Request $request)
    {
        // TODO: Implement filter() method.
        $filter = $request->filter;
        switch ($filter){
            case 'DESC':
                $list = Product::orderBy('id', 'DESC')->paginate($this->paginateItems);
                return view('be.product.list', compact('list'));
            case 'ASC':
                $list = Product::orderBy('id', 'ASC')->paginate($this->paginateItems);
                return view('be.product.list', compact('list'));
            case 'a-z':
                $list = Product::orderBy('name', 'ASC')->paginate($this->paginateItems);
                return view('be.product.list', compact('list'));
            case 'z-a':
                $list = Product::orderBy('name', 'DESC')->paginate($this->paginateItems);
                return view('be.product.list', compact('list'));
            case 'price-tang':
                $list = Product::orderBy('price', 'ASC')->paginate($this->paginateItems);
                return view('be.product.list', compact('list'));
            case 'price-giam':
                $list = Product::orderBy('price', 'DESC')->paginate($this->paginateItems);
                return view('be.product.list', compact('list'));
            case 'active':
                $list = Product::where('active',0)->paginate($this->paginateItems);
                return view('be.product.list', compact('list'));
        }
    }
}
