<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class OrderController extends Controller
{
    public function add(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::where('id',$id)->first();
            $userId = Auth::id();
            $data = request()->all();
            $data['user_id'] = $userId;
            $order = Order::create($data);

            $order_product = new Order_product();
            $order_product->order_id = $order->id;
            $order_product->user_id = $userId;
            $order_product->product_id = $product->id;
            $order_product->quantity = $request->quantity;
            $order_product->save();


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message', 'thêm thất bại'], 500);
        }
        return response()->json(['message','thêm thành công'],200);
    }

}
