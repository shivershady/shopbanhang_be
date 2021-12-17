<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Product;
use App\Models\User;
use App\Transformers\ProductTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use App\Transformers\CategoryTransformer;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        try {
            $userId = Auth::id();
            $check = Cart_item::where('user_id', $userId)->where('product_id', $id)->first();
            $product = Product::find($id);
            if ($check) {
                return response()->json(['message', 'sản phẩm đã có trong giỏ hàng']);
            } else {
                $cartItem = new Cart_item();
                $cartItem->product_id = $product->id;
                $cartItem->quantity = $request->quantity;
                $cartItem->user_id = $userId;
                $cartItem->total = $request->quantity * $product->price;
                $cartItem->shop_name = $product->user_id;
                $cartItem->save();
            }
        } catch (Exception $e) {
            return response()->json(['message', 'thêm sản phẩm vào giỏ hàng thất bại'], 500);
        }
        return response()->json(['message', ' sản phẩm đã được thêm vào giỏ hàng'], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $userId = Auth::id();
            $data = request()->only('quantity');
            if ($data['quantity'] == 0 || $data['quantity'] < 0) {
                return response()->json(['message', 'số lượng không được bằng 0'], 500);
            } else {
                Cart_item::where('user_id', $userId)->where('product_id', $id)->update($data);
            }
        } catch (Exception $e) {
            return response()->json(['message', 'cập nhật  thất bại'], 500);
        }
        return response()->json(['message', 'cập nhật  thành công'], 200);
    }


    public function delete($id)
    {
        try {
            //$userId = Auth::id();
            //Cart_item::where('product_id',$id)->where('user_id',$userId)->delete();
            Cart_item::where('id', $id)->delete();
        } catch (Exception $e) {
            return response()->json(['message', 'xóa sản phẩm khỏi giỏ hàng thất bại'], 500);
        }
        return response()->json(['message', 'sản phẩm đã được xóa khỏi giỏ hàng'], 200);
    }

    public function list()
    {
        $userId = Auth::id();
        $cart = Cart_item::where('user_id', $userId)->get();
        $data = $cart->map(function ($item) {
            $item->product->image->url = asset($item->product->image->url);
            $item->shop_name = User::find($item->shop_name)->name;
            return $item;
        });
        $grouped = $data->groupBy('shop_name');
        return response()->json(['data' => $grouped], 200);
    }

}
