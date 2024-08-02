<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function productsPage()
    {
        $data = Products::all();
        return view('user.pages.products', compact('data'));
    }

    public function productDetailPage($id)
    {
        $data = Products::find($id);
        return view('user.pages.product_detail', compact('data'));
    }
    public function add_cart(Request $request, $id)
    {
        if (Auth::check()) {
            $product = Products::find($id);

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }

            $user = Auth::user();

            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->title = $product->title;
            $cart->price = $product->price;
            $cart->image = $product->image;
            $cart->quantity = 1; // Default quantity
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->save();

            return redirect()->back()->with('success', 'Product added to cart successfully.');
        } else {
            return redirect('login');
        }
    }
}
