<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use App\Models\Variant_value;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class VariantValueController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Variant_value::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.variant_value.list', compact('list'));
    }

    public function add()
    {
        // TODO: Implement add() method.
        $variants = Variant::all();
        return view('be.variant_value.add', compact('variants'));
    }

    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
        try {
            $data = request()->except(['_token']);
            Variant_value::create($data);
        } catch (\Exception $e) {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'variant_id' => 'required'
            ]);
            return redirect()->back()->with('error', 'thêm không thành công');
//            echo $e->getMessage();
        }
        return redirect()->back()->with('success', 'thêm thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Variant_value::find($id);
        $variants = Variant::all();
        return view('be.variant_value.edit', compact('obj', 'variants'));

    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        try {
            $data = request()->except('_token');
            Variant_value::find($id)->update($data);
        } catch (\Exception $e) {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'variant_id' => 'required'
            ]);
            return redirect()->back()->with('error', 'sửa không thành công');
        }
        return redirect()->back()->with('success', 'sửa thành công');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            Variant_value::find($id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'xóa không thành công');
        }
        return redirect()->back()->with('success', 'xóa thành công');
    }
}
