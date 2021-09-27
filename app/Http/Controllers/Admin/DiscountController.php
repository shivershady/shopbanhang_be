<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use PHPUnit\Util\Exception;

class DiscountController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Discount::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.discount.list', compact('list'));
    }
    public function add()
    {
        // TODO: Implement add() method.
        return view('be.discount.add');
    }
    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
        try {
            $data = request()->except('_token');
            Discount::create($data);
        }catch (\Exception $e){
            $request->validate([
               'name'=>'required',
               'desc'=>'required',
               'discount_percent'=>'required|numeric|between:0,99.99',
                'active'=>'required'
            ]);
            return redirect()->back()->with('error','thêm  thất bại');
        }
        return redirect(route('admin.discount.list'))->with('success','thêm thành công');

    }
    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Discount::find($id);
        return view('be.discount.edit',compact('obj'));
    }
    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        try {
            $data = request()->except('_token');
            Discount::find($id)->update($data);
        }catch (\Exception $e){
            $request->validate([
                'name'=>'required',
                'desc'=>'required',
                'discount_percent'=>'required',
                'active'=>'required'
            ]);
            return redirect()->back()->with('error','sửa thất bại');
        }
        return  redirect(route('admin.discount.list'))->with('success','sửa thành công');
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Discount::find($id)->delete();
        }catch (\Exception $e){
            return redirect()->back()->with('error','xóa thất bại');
        }
        return redirect()->back()->with('success','xóa thành công');
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
