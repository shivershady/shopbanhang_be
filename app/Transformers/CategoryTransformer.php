<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id' =>$category->id,
            'name' =>$category->name,
            'slug' => $category->slug,
            'parent_id' => $category->parent_id,
            'status' => $category->status,
            'total_product' => $category->total_product,
            'author_id' => $category->author_id,
            'description' => $category->description,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'url' => $category->image?asset($category->image->url):'https://via.placeholder.com/150

C/O https://placeholder.com/',
        ];
    }
}
