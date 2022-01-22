<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Transformers\ProductTransformer;
use Illuminate\Http\Request;
use App\Transformers\CategoryTransformer;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::with('image')->get();
        return fractal()
            ->collection($categories)
            ->transformWith(new CategoryTransformer)
            ->toArray();
    }

    public function listByParentId(Request $request)
    {
        $parentId = $request->get('id') ?? 0;
        $parentCategory = Category::where('parent_id', $parentId)->get();
        return fractal()
            ->collection($parentCategory)
            ->transformWith(new CategoryTransformer)
            ->toArray();
    }

    public function listProductByCategory($id)
    {
        $product = Product::with('image')->where('category_id', $id)->get();
        return fractal()
            ->collection($product)
            ->transformWith(new ProductTransformer())
            ->toArray();
    }
}
