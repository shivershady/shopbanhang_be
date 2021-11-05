<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        for($m=0; $m<20; $m++){
         $product = new Product();
         $product->name = 'product'.$m;
            $product->slug = 'slug'.$m;
            $product->category_id = 2;
            $product->quantity = 22;
            $product->price = 22;
            $product->discount_id = 1;
            $product->user_id = 1;
            $product->active = 1;
            $product->description='description'.$m;
            $product->iHot = 'ihot'.$m;
            $product->iPay = 'ipay'.$m;
            $product->warranty = 'warranty'.$m;
            $product->view = 'view'.$m;
            $product->content = 'content'.$m;
            $product->save();

            $image = new Image();
            $image->imageable_id = $product->id;
            $image->imageable_type = Product::class;
            $image->url = 'https://media.istockphoto.com/photos/colored-powder-explosion-on-black-background-picture-id1057506940?k=20&m=1057506940&s=612x612&w=0&h=3j5EA6YFVg3q-laNqTGtLxfCKVR3_o6gcVZZseNaWGk=';
            $image->save();

            $discount = new Discount();
            $discount->name = $product->name;
            $discount->desc = $product->description;
            $discount->discount_percent = $product->discount_id;
            $discount->active = $product->active;
            $discount->save();

            $product_category = new Product_category();
            $product_category->product_id = $product->id;
            $product_category->category_id = $product->category_id;
            $product_category->save();

        }
    }
}
