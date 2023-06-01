<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('dashboard')->with('products', $products);
    }

    public function import(Request $request)
    {
        Excel::import(new ProductsImport, request()->file('file'));
        return redirect()->back()->with('alert', 'Excel başarıyla yüklendi!');
    }
}
