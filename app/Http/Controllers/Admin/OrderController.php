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

    }

    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Order::find($id);
        $users = User::all();
        return view('be.order.edit', compact('obj', 'users'));
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        $request->validate([
            'total' => 'required|numeric',
            'sub_total' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'payment_type' => 'required'
        ]);
        try {
            $data = request()->except(['_token']);
            Order::find($id)->update($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'sửa thất bại');
        }
        return redirect(route('admin.order.list'))->with('success', 'sửa thành công');

    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Order::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'xóa thành công');
        }
        return redirect(route('admin.order.list'))->with('success', 'xóa thành công');
    }

    public function search(Request $request)
    {
        // TODO: Implement search() method.
        $q = $request->q;
        // TODO: Implement list() method.
        $list = Order::where('total', 'LIKE', '%' . $q . '%')->orWhere('sub_total', 'LIKE', '%' . $q . '%')->orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.order.list', compact('list'));
    }

    public function filter(Request $request)
    {
        // TODO: Implement filter() method.
        $filter = $request->filter;
        switch ($filter) {
            case 'DESC':
                $list = Order::orderBy('id', 'DESC')->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));
            case 'pending':
                $list = Order::where('status', 1)->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));
            case 'processing':
                $list = Order::where('status', 2)->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));
            case 'sent':
                $list = Order::where('status', 3)->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));
            case 'received':
                $list = Order::where('status', 4)->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));
            case 'cancel':
                $list = Order::where('status', 5)->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));

            case 'ASC':
                $list = Order::orderBy('id', 'ASC')->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));
            case 'a-z':
                $list = Order::orderBy('total', 'ASC')->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));
            case 'z-a':
                $list = Order::orderBy('total', 'DESC')->paginate($this->paginateItems);
                return view('be.order.list', compact('list'));

        }
    }
}
