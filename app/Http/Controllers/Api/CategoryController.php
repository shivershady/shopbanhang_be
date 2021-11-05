<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Transformers\CategoryTransformer;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return fractal()
            ->collection($categories)
            ->transformWith(new CategoryTransformer)
            ->toArray();
    }

    public function listByParentId(Request $request)
    {
        $parentId = $request->get('id') ?? 0;
        $parentCategory = Category::with('image')->where('parent_id', $parentId)->get();
        return response()->json(['parentCategory' => $parentCategory]);
    }

}
