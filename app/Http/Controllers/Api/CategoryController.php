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

    public function listByParentId()
    {
        $parentCategory = Category::with('image')->where('parent_id',0)->get();
        return response()->json(['parentCategory' => $parentCategory]);
    }

    public function categoryDetails($id){
        $categoryDetails = Category::with('image')->where('parent_id',$id)->get();
        return response()->json(['categoryDetails'=>$categoryDetails]);
    }
}
