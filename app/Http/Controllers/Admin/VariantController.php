<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use PHPUnit\Util\Exception;

class VariantController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Variant::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.variant.list', compact('list'));
    }
    public function add()
    {
        // TODO: Implement add() method.
         $products = Product::all();
        return view('be.variant.add',compact('products'));
    }
    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
        try {
            $data = $request->except('_token');
            Variant::create($data);
        }catch (\Exception $e){
            $request->validate([
               'name'=>'required'
            ]);
            return redirect()->back()->with('error','thêm thất bại');
        }
        return redirect(route('admin.variant.list'))->with('success','thêm thành công');
    }
    public function edit($id)
    {
        // TODO: Implement edit() method.
        $variant = Variant::find($id);
        $products = Product::all();
        return view('be.variant.edit',compact('variant','products'));
    }
    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        try {
            $data = request()->except(['_token']);
            Variant::where('id', $id)->update($data);
        }catch (\Exception $e){
            $request->validate([
               'name'=>'required'
            ]);
            return redirect()->back()->with('error','sửa không thành công');
        }
        return redirect(route('admin.variant.list'))->with('success','thêm thành công');
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Variant::where('id',$id)->delete();
        }catch (\Exception $e){
            return redirect()->back()->with('error','xóa thất bại');
        }
        return redirect(route('admin.variant.list'))->with('success','xóa thành công');
    }
    public function search(Request $request)
    {
        // TODO: Implement search() method.
    }
}
