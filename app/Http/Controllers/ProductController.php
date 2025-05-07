<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        //
        $products = Product::latest()->paginate(5);

        return $this->sendResponse([
            'products' => $products,
        ], '');

    }

    public function store(Request $req)
    {
        //
        $ProductInfo = $req->validate([
            //
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $prod = Product::create($ProductInfo);

        return $this->sendResponse([
            'product' => $prod,

        ], 'Product created successfully'
        );

    }

    public function show(Product $prod)
    {
        //
        return $this->sendResponse(
            ['product' => $prod],
            'Product retrieved successfully.',
        );

    }

    public function update(Request $req, Product $product)
    {
        //
        $ProductInfo = $req->validate([
            //
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        $prod = $product->update($ProductInfo);

        return $this->sendResponse(
            ['product' => $prod],
            'Product updated successfully.',
        );
    }

    public function destroy(Product $prod)
    {
        //
        $prod->delete();

        return $this->sendResponse([], 'Product deleted successfully');
    }
}
