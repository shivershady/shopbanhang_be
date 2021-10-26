<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $userId = Auth::id();
            $check = Cart_item::where('product_id', $id)->first();
            $product = Product::where('id', $id)->first();
            if ($check) {
                return response()->json(['message', 'sản phẩm đã được thêm vào giỏ hàng']);
            } else {
                $cart = new Cart();
                $cart->user_id = $userId;
                $cart->total = $request->total;
                $cart->save();

                $cartItem = new Cart_item();
                $cartItem->cart_id = $cart->id;
                $cartItem->product_id = $product->id;
                $cartItem->quantity = $request->quantity;
                $cartItem->save();
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message', 'thêm  thất bại'], 500);
        }
        return response()->json(['message', 'thêm thành công'], 200);
    }

    public function delete($id)
    {
        try {
         $mien = Cart_item::where('product_id',$id)->first();
         Cart_item::find($mien->id)->cart->delete();
         Cart_item::where('product_id',$id)->delete();
        } catch (Exception $e) {

            return response()->json(['message', 'xóa thất bại'],500);
        }
        return response()->json(['message', 'xóa thành công'], 200);
    }
}
