<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Statement;
use Illuminate\Http\Request;

class StatementController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Statement::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.statement.list', compact('list'));
    }

    public function add()
    {
        // TODO: Implement add() method.
        $orders = Order::all();
        return view('be.statement.add', compact('orders'));
    }

    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
        $request->validate([
            'is_sub' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'order_id' => 'required',
        ]);
        try {
            $data = request()->except(['_token']);
            Statement::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'thêm thất bại');
        }
        return redirect(route('admin.statement.list'))->with('success', 'thêm thành công');

    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $orders = Order::all();
        $obj = Statement::find($id);
        return view('be.statement.edit',compact('orders','obj'));
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        $request->validate([
            'is_sub' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'order_id' => 'required',
        ]);

        try {
            $data = request()->except(['_token']);
            Statement::find($id)->update($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'sửa thất bại');
        }
        return redirect(route('admin.statement.list'))->with('success', 'sửa thành công');

    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
         Statement::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'xóa thất bại');
        }
        return redirect(route('admin.statement.list'))->with('success', 'xóa thành công');

    }

    public function search(Request $request)
    {
        // TODO: Implement search() method.
        $q = $request->q;
        // TODO: Implement list() method.
        $list = Statement::where('created_at', 'LIKE', '%' . $q . '%')->orWhere('amount', 'LIKE', '%' . $q . '%')->orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.statement.list', compact('list'));
    }

    public function filter(Request $request)
    {
        // TODO: Implement filter() method.
        $filter = $request->filter;
        switch ($filter){
            case 'DESC':
                $list = Statement::orderBy('id', 'DESC')->paginate($this->paginateItems);
                return view('be.statement.list', compact('list'));

            case 'ASC':
                $list = Statement::orderBy('id', 'ASC')->paginate($this->paginateItems);
                return view('be.statement.list', compact('list'));
            case 'a-z':
                $list = Statement::orderBy('amount', 'ASC')->paginate($this->paginateItems);
                return view('be.statement.list', compact('list'));
            case 'z-a':
                $list = Statement::orderBy('amount', 'DESC')->paginate($this->paginateItems);
                return view('be.statement.list', compact('list'));
        }
    }

}
