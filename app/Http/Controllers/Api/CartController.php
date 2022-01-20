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
                return response()->json(['message' => 'sản phẩm đã có trong giỏ hàng']);
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
            return response()->json(['message' => 'thêm sản phẩm vào giỏ hàng thất bại'], 500);
        }
        return response()->json(['message' => ' sản phẩm đã được thêm vào giỏ hàng'], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $userId = Auth::id();
            $data = request()->only('quantity');
            if ($data['quantity'] == 0 || $data['quantity'] < 0) {
                return response()->json(['message' => 'số lượng không được bằng 0'], 500);
            } else {
                Cart_item::where('user_id', $userId)->where('product_id', $id)->update($data);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'cập nhật  thất bại'], 500);
        }
        return response()->json(['message' => 'cập nhật  thành công'], 200);
    }


    public function delete($id)
    {
        try {
            //$userId = Auth::id();
            //Cart_item::where('product_id',$id)->where('user_id',$userId)->delete();
            Cart_item::where('id', $id)->delete();
        } catch (Exception $e) {
            return response()->json(['message' => 'xóa sản phẩm khỏi giỏ hàng thất bại'], 500);
        }
        return response()->json(['message' => 'sản phẩm đã được xóa khỏi giỏ hàng'], 200);
    }

    public function list()
    {


//   [
//
//   {
//   shop_name:{
//   id:1,
//   name:'shop1',
//   },
//   products:[
//   {
//   id:1,
//   ......
//   }
//]
//   }
//   ]

        $userId = Auth::id();
        $cart = Cart_item::where('user_id', $userId)->get();
        $data = [];
           foreach ($cart as $key => $value) {
            $product = Product::find($value->product_id);
            $shop = User::find($value->shop_name);
            $data[$key]['shop_name'] = [
                'id' => $shop->id,
                'name' => $shop->name,
            ];
            $data[$key]['products'] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'category_id' => $product->category_id,
                'discount' => $product->discount_id,
                'active' => $product->active,
                'iHot' => $product->iHot,
                'iPay' => $product->iPay,
                'price' => $product->price,
                'quantity' => $value->quantity,
                'content' => $product->content,
                'warranty' => $product->warranty,
                'view' => $product->view,
                'total' => $value->total,
                'image' => asset($product->image->url),
                'description' => $product->description,
                'user_id' => $product->user_id,
            ];
        }
        $data = collect($data)->groupBy('shop_name.id')->values()->all();
        return response()->json( $data, 200);
    }

}
