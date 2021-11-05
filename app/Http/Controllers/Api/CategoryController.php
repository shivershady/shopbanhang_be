<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::with('image')->get();
        return response()->json(['category' => $categories->toArray()]);
    }

    public function listByParentId($id)
    {
        $categories = Category::with('image')->where('parent_id',$id);
        return response()->json(['category' => $categories]);
    }
}
