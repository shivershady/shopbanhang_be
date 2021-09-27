<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Util\Exception;

class OrderController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Order::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.order.list', compact('list'));
    }

    public function add()
    {
        // TODO: Implement add() method.
        $users = User::all();
        return view('be.order.add', compact('users'));
    }

    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
        try {
            $data = request()->except('_token');
            Order::create($data);
        } catch (\Exception $e) {
            $request->validate([
                'total' => 'required|numeric',
                'sub_total' => 'required',
                'user_id' => 'required',
                'status' => 'required',
                'payment_type' => 'required'
            ]);
            return redirect()->back()->with('error','thêm thất bại');
          //  echo $e->getMessage();
        }
        return redirect(route('admin.order.list'))->with('success','thêm thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Order::find($id);
        $users = User::all();
        return view('be.order.edit',compact('obj','users'));
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Order::find($id)->delete();
        }catch (\Exception $e){
            return redirect()->back()->with('error','xóa thành công');
        }
        return redirect(route('admin.order.list'))->with('success','xóa thành công');
    }
    public function search(Request $request)
    {
        // TODO: Implement search() method.
    }
    public function filter(Request $request)
    {
        // TODO: Implement filter() method.
    }
}
