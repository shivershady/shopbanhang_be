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
            $userId = Auth::id();
            $check = Cart_item::where('user_id', $userId)->where('product_id', $id)->first();
            $product = Product::find($id);
            if ($check) {
                return response()->json(['message', 'sản phẩm đã được thêm vào giỏ hàng']);
            } else {
                $cartItem = new Cart_item();
                $cartItem->product_id = $product->id;
                $cartItem->quantity = $request->quantity;
                $cartItem->user_id = $userId;
                $cartItem->total = $request->quantity * $product->price;
                $cartItem->save();
            }
        } catch (Exception $e) {
            return response()->json(['message', 'thêm sản phẩm vào giỏ hàng thất bại'], 500);
        }
        return response()->json(['message', 'sản phẩm đã được thêm vào giỏ hàng'], 200);
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
        //lấy ra sản phẩm trong giỏ hàng
        // get product in cart
        $products = [];
        foreach ($cart as $item) {
            $product = Product::find($item->product_id);
            $product->quantity = $item->quantity;
            $product->total = $item->total;
            $products[] = $product;
        }
        return response()->json($products, 200);
        //lấy ra được shop bán hàng trong giỏ hàng
        /*        [
                    {shop: shop_info
                        {
                            product
                        }
                    },
                  {shop: shop_info
                        {
                            product
                        }
                    }
                ]*/
        return response()->json(['cart' => $cart]);
    }

}
