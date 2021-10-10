<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->images;
        }
        return response()->json(['category'=>$categories]);
    }
}
