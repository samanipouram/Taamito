<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class ProductController extends Controller
{
    public function index(ProductService $productService)
    {
        $products = $productService->getProducts();
        return view('pages.products.index' , compact('products'));
    }
}
