<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function imageProcessing($req){
        $image = $req->file('image');
        $imageName = $image->getClientOriginalName();
        $directory = "assets/upload/product_images/";
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }

    function createProduct($data){
        $product = new Product();
        $product->name = $data->name;
        $product->price = $data->price;
        $product->quantity = $data->quantity;
        $product->category_id = $data->category_id;
        $product->short_description = $data->short_description;
        $product->long_description = $data->long_description;
        $product->image = $product->imageProcessing($data);
        $product->save();
    }

}
