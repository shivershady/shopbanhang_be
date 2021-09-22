<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class UserController extends Controller implements ICRUD
{
    public function list()
    {
        $list = User::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.user.list', compact('list'));
    }

    public function add()
    {
        return view('be.user.add');
    }

    public function doAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required|min:10',
            'user_seller' => 'required'
        ]);

        try {
            $data = request()->except(['_token']);
            $data['password'] = bcrypt($request->password);
            User::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'thêm thất bại');
        }

        return redirect(route('admin.user.list'))->with('success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $obj = User::find($id);
        // TODO: Implement edit() method.
        return view('be.user.edit', compact('obj'));
    }

    public function doEdit($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'phone' => 'required|min:10',
            'user_seller' => 'required'
        ]);
        // TODO: Implement doEdit() method.
        try {

            $data = request()->except(['_token']);
            $data['password'] = Hash::make($data['password']);
            User::where('id', $id)->update($data);
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Sửa thất bại');
        }
        return redirect(route('admin.user.list'))->with('success', 'Sửa thành công');

    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            User::where('id', $id)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xoá thất bại');
        }
        return redirect()->back()->with('success', 'Xoá thành công');
    }

}
