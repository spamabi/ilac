<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests; 

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

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('dashboard');
    }


}
