<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart_item;
use App\Models\Discount;
use App\Models\Image;
use App\Models\Order_product;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Variant;
use App\Models\Variant_value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::with('image')->get();
        return response()->json(['products' => $products->toArray()]);
    }

    public function productDetails($id)
    {
        $productDetails = Product::with('image')->where('id', $id)->get();
        return response()->json(['productDetails' => $productDetails->toArray()]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required', 'slug' => 'required', 'category_id' => 'required',
            'quantity' => 'required', 'price' => 'required', 'discount_id' => 'required',
            'active' => 'required', 'iHot' => 'required', 'iPay' => 'required',
            'description' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $data = $request->request->all();
            $data['slug'] = Str::slug($request->name . Str::random(3));
            $product = Product::create($data);
            $files = $request->file('img');

            for ($i = 0; $i < count($files); $i++) {
                $file = $files[$i];
                $fileName = time() . $file->getClientOriginalName();
                $file->storeAs('/products', $fileName, 'public');
                //chèn vào bảng image
                $image = new Image();
                $image->imageable_id = $product->id;
                $image->imageable_type = Product::class;
                $image->url = 'storage/products/' . $fileName;
                $image->save();
            }

            $discount = new Discount();
            $discount->name = $product->name;
            $discount->desc = $product->description;
            $discount->discount_percent = $product->discount_id;
            $discount->active = $product->active;
            $discount->save();

//            $variant = new Variant();
//            $variant->name = $request->variant;
//            $variant->product_id = $product->id;
//            $variant->save();
//
//            $variant_value = new Variant_value();
//            $variant_value->name = $request->variant_value;
//            $variant_value->variant_id = $variant->id;
//            $variant_value->price = $request->variant_value_price;
//            $variant_value->save();

            $product_category = new Product_category();
            $product_category->product_id = $product->id;
            $product_category->category_id = $product->category_id;
            $product_category->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error', 'thêm thất bại'], 500);
        }
        return response()->json(['success', 'thêm thành công'], 200);
    }
}
