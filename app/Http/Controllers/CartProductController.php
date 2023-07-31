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
        $product = Product::findOrFail($id);
 
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->first();
 
            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->quantity = 1;
                $cart->save();
            }
 
            $cartItem = $cart->cart_product()->where('product_id', $product->id)->first();
 
            if ($cartItem) {
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                // Tạo đối tượng CartItem mới và gán giá trị quantity ban đầu là 1
                $cartItem = new CartProduct();
                $cartItem->cart_id = $cart->id;
                $cartItem->product_id = $product->id;
                $cartItem->quantity = 1;
                $cartItem->price = 1;
                $cartItem->save();
            }
        } else {
            // Xử lý khi người dùng chưa đăng nhập
            $cart = session()->get('cart', []);
            
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "product_name" => $product->name,
                    "image" => $product->image,
                    "price" => $product->price,
                    "quantity" => 1
                ];
            }
            
            session()->put('cart', $cart);
        }

        // Lưu giỏ hàng vào session sau khi thêm sản phẩm
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function updateCartQuantity($productId, $quantity)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }

            Session::put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        } else {
            session()->flash('error', 'Product not found in the cart.');
        }

        return redirect()->route('cart.show');
    }

    public function updateCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:product,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        return $this->updateCartQuantity($productId, $quantity);
    }


    public function remove(Request $request)
    {
        $productId = $request->id;
        $userId = Auth::id();
        $cartProduct = CartProduct::whereHas('cart', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('product_id', $productId)->first();

        if ($cartProduct) {
            $cartProduct->delete();
            session()->flash('success', 'Product successfully removed!');
        } else {
            session()->flash('error', 'Product not found in the cart.');
        }

        return redirect()->route('cart'); // Chuyển hướng về trang hiển thị giỏ hàng sau khi xóa
    }

    public function showCart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->with('cart_product')->first();

            if ($cart) {
                $cartProducts = $cart->CartProduct;
            } else {
                // Handle the case when the user has an empty cart
                $cartProducts = [];
            }
        } 
        return view('page.cart', compact('cartProducts'));
    }
}