<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Keyword::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.keyword.list', compact('list'));
    }

    public function add()
    {
        // TODO: Implement add() method.
        return view('be.keyword.add');
    }

    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
        try {
            $data = request()->except('_token');
            Keyword::create($data);
        } catch (\Exception $e) {
            $request->validate([
                'name' => 'required'
            ]);
            return redirect()->back()->with('error', 'thêm thất bại');
        }
        return redirect(route('admin.keyword.list'))->with('success', 'thêm thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Keyword::find($id);
        return view('be.keyword.edit', compact('obj'));
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        try {
            $data = request()->except('_token');
            Keyword::find($id)->update($data);
        } catch (\Exception $e) {
            $request->validate([
                'name' => 'required'
            ]);
            return redirect()->back()->with('error', 'sửa thất bại');
            //echo $e->getMessage();
        }
        return redirect(route('admin.keyword.list'))->with('success', 'sửa thành công');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Keyword::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'xóa thất bại');
        }
        return redirect(route('admin.keyword.list'))->with('success', 'xóa thành công');
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
