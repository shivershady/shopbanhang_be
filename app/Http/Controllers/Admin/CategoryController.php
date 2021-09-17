<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class CategoryController extends Controller implements ICRUD
{
    public function list()
    {
        $list = Category::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.category.list', compact('list'));
    }
    public function add()
    {
        $categories = Category::all();
        return view('be.category.add',compact('categories'));
    }
    public function doAdd(Request $request)
    {
     $request->validate([
         'name'=>'required',
         'slug'=>'required',
          'parent_id'=>'required',
         'total_product'=>'required',
         'author_id'=>'required'
     ]);
        $data = request()->except(['_token']);
     Category::create($data);
        return redirect(route('admin.category.list'))->with('success', 'Thêm thành công');
    }
    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Category::find($id);
        $categories = Category::where('id','<>',$id)->get();
        return view('be.category.edit',compact('obj','categories'));

    }
    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        try {

            $data = request()->except(['_token']);
            Category::where('id', $id)->update($data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
        return redirect(route('admin.category.list'))->with('success', 'Sửa thành công');
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Category::where('id', $id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xoá thất bại');
        }
        return redirect()->back()->with('success', 'Xoá thành công');

    }
}
