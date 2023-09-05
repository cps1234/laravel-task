<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
use Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::getProducts();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_title' => 'required|unique:products|max:255',
            'product_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["success" => false, "errors" => $validator->messages()]);

        }

        return Product::addProduct($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::getProduct($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'product_title' => 'required|max:255|unique:products,'.$id,
            'product_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["success" => false, "errors" => $validator->messages()]);

        }

        return Product::updateProduct($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::deleteProduct();
    }
}
