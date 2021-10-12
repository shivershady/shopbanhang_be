<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Image;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        foreach ($products as $product){
            $img = $product->images;
        }
        //  $data = array_merge($categories,$img);
        return response()->json(['category' => $products]);

    }

    public function add(Request $request)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($request->all());
            $file = $request->file('img');
            //upload từng file
            $fileName = time() . $file->getClientOriginalName();
            $file->storeAs('/products', $fileName, 'public');
            //chèn vào bảng image
            $image = new Image();
            $image->imageable_id = $product->id;
            $image->imageable_type = Product::class;
            $image->url = 'storage/products/' . $fileName;
            $image->save();

            $discount = new Discount();
            $discount->name = $product->name;
            $discount->desc = $product->description;
            $discount->discount_percent = $product->discount_id;
            $discount->active = $product->active;
            $discount->save();


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error','thêm thất bại'],500);
        }
        return response()->json(['success','thêm thành công'],200);
    }
}
