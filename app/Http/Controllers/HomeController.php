<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
class HomeController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        return view('page.viewproduct', ['product' => $product]);
    }
    public function search(){
       
        $search = $_GET['query'];
  
        $searchs = Product::where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('description', 'LIKE', '%'.$search.'%')
                    ->get();
        
        return view('page.search', compact('searchs'));
    }
}
