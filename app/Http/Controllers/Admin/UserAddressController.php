<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\Request;
use PHPUnit\Util\Exception;

class UserAddressController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = User_address::orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.user_address.list', compact('list'));
    }

    public function add()
    {
        // TODO: Implement add() method.
        $users = User::all();
        return view('be.user_address.add', compact('users'));
    }

    public function doAdd(Request $request)
    {
        // TODO: Implement doAdd() method.
        try {
            $data = request()->except(['_token']);
            User_address::create($data);
        } catch (\Exception $e) {
            $request->validate([
                'address_line1' => 'required',
                'address_line2' => 'required',
                'province' => 'required',
                'city' => 'required'
            ]);
            return redirect()->back()->with('error', 'thêm không thành công');
        // echo $e->getMessage();
        }
        return redirect(route('admin.user_address.list'))->with('success', 'thêm thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = User_address::find($id);
        $users = User::all();
        return view('be.user_address.edit',compact('obj','users'));
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        $request->validate([
            'address_line1' => 'required',
            'address_line2' => 'required',
            'province' => 'required',
            'city' => 'required'
        ]);
        try {
            $data = request()->except(['_token']);
            User_address::find($id)->update($data);
        }catch (Exception $e){
            return redirect()->back()->with('error','sửa thất bại');
           // echo $e->getMassage();
        }
        return  redirect(route('admin.user_address.list'))->with('success','sửa thành công');
    }

    public function search(Request $request)
    {
        // TODO: Implement search() method.
        $q = $request->q;
        // TODO: Implement list() method.
        $list = User_address::where('address_line1', 'LIKE', '%' . $q . '%')->orWhere('province', 'LIKE', '%' . $q . '%')->orderBy('updated_at', 'DESC')->paginate($this->paginateItems);
        return view('be.user_address.list', compact('list'));
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            User_address::find($id)->delete();
        }catch (\Exception $e){
            return redirect()->back()->with('success','xóa thất bại');
        }
        return redirect(route('admin.user_address.list'))->with('success','xóa thành công');
    }
  public function filter(Request $request)
  {
      // TODO: Implement filter() method.
      $filter = $request->filter;
      switch ($filter){
          case 'DESC':
              $list = User_address::orderBy('id', 'DESC')->paginate($this->paginateItems);
              return view('be.User_address.list', compact('list'));

          case 'ASC':
              $list = User_address::orderBy('id', 'ASC')->paginate($this->paginateItems);
              return view('be.User_address.list', compact('list'));
          case 'a-z':
              $list = User_address::orderBy('address_line1', 'ASC')->paginate($this->paginateItems);
              return view('be.User_address.list', compact('list'));
          case 'z-a':
              $list = User_address::orderBy('address_line2', 'DESC')->paginate($this->paginateItems);
              return view('be.User_address.list', compact('list'));
      }
  }
}
