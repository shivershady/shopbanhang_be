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
        return Product::all();
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

            $variants = $request->input('variants');
            foreach ($variants as $variant) {
                $variantArr = explode('|', $variant);
                $variantValue = array();
                $variantValue['name'] = $variantArr[1];
                $variantValue['variant_id'] = $variantArr[0];
                }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return reponse()->json('error', 500);
        }
        return response()->json('success', 200);
    }
}
