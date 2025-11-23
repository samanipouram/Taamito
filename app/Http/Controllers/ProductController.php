<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductService $productService)
    {
        $products = $productService->getProducts();
        return view('pages.products.index' , compact('products'));
    }
}
