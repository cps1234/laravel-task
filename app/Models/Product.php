<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Create New Product
     *
     * Create new product
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public static function addProduct($formData)
    {
        $product = new self;
        $product->product_title = $formData->product_title;
        $product->product_desc = $formData->product_desc;
        $product->status = 1;
        $product->save();

        return response()->json(["success" => true, "data" => $product]);

    }

    /**
     * Update Product
     *
     * Update product
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public static function updateProduct($id, $formData)
    {
        $product = self::find($id);
        $product->product_title = $formData->product_title;
        $product->product_desc = $formData->product_desc;
        $product->status = 1;
        $product->save();

        return response()->json(["success" => true, "data" => $product]);

    }
}
