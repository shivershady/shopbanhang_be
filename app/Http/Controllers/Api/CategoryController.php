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
        foreach ($categories as $category){
            $img = $category->images;
        }
      //  $data = array_merge($categories,$img);
      return response()->json(['category' => $categories,$img]);

    }

}
