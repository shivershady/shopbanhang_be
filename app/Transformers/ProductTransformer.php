<?php

namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{

    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'category_id' => $product->category_id,
            'quantity' => $product->quantity,
            'price' => $product->price,
            'discount_id' => $product->discount_id,
            'user_id' => $product->user_id,
            'active' => $product->active,
            'iHot' => $product->iHot,
            'iPay' => $product->ipay,
            'warranty' => $product->warranty,
            'description' => $product->description,
            'content' => $product->content,
            'view' => $product->view,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'url' =>$product->image? asset($product->image->url):'https://via.placeholder.com/150
C/O https://placeholder.com/',
        ];
    }
}
