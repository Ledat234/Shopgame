<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartProductController extends Controller
{

    public function cart()
    {
        $cartProducts = CartProduct::with('product')->get();
        // Retrieve the cartProducts from the database with associated products

        return view('page.cart', compact('cartProducts'));
    }
    public function addToCart($id)
    {
        $cartProducts = CartProduct::with('product')->get();
        
        if (Auth::check()) {
            $userId = Auth::id();
            $userCartProducts = CartProduct::whereHas('cart', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->with('product')->get();

            return view('page.cart', compact('userCartProducts'));
        }
       
        return view('page.cart', compact('cartProducts'));
    }
 
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
}