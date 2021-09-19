<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $categories = Category::all();
        $discounts = Discount::all();
        return view('be.product.add', compact('categories', 'discounts'));
    }

    public function doAdd(Request $request)
    {
        $files = $request->file('img');
        if (!$files || count($files) == 0) {
            return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một hình ảnh');
        }
        try {
            DB::beginTransaction();
            $data = request()->except('_token', 'img');
            $product = Product::create($data);

            for ($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                //upload từng file
                $fileName = time() . $i . $file->getClientOriginalName();
                $file->storeAs('/products', $fileName, 'public');
                //chèn vào bảng image
                $image = new Image();
                $image->imageable_id = $product->id;
                $image->imageable_type = Product::class;
                $image->path = 'storage/products/' . $fileName;
                $image->save();
            }
            DB::commit();
        } catch (Exception $e) {
            $request->validate([
                'name' => 'required', 'slug' => 'required', 'category_id' => 'required',
                'quantity' => 'required', 'price' => 'required', 'discount_id' => 'required',
                'active' => 'required', 'iHot' => 'required', 'iPay' => 'required',
                'warranty' => 'required', 'view' => 'required', 'description' => 'required',
                'description_seo' => 'required','title_seo' => 'required', 'keyword_seo'=>'required'
            ]);
            DB::rollBack();
            return redirect()->back()->with('error', 'thêm thất bại');
             echo $e->getMessage();
        }
        return redirect(route('admin.product.list'))->with('success', 'thêm thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function search()
    {

    }
}
