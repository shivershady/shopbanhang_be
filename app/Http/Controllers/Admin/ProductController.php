<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller implements ICRUD
{
    public function list()
    {
        // TODO: Implement list() method.
    }
    public function add()
    {
       return view('be.product.add');
    }
    public function doAdd(Request $request)
    {

    }
    public function edit($id)
    {
        // TODO: Implement edit() method.
    }
    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
    public function search(){

    }
}
