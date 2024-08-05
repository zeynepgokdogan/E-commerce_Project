<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Products;
use App\Models\Order;
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
                return response()->json(['error' => 'Product not found.']);
            }

            $user = Auth::user();

            // Check if product is already in the cart
            $existingCartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->first();

            if ($existingCartItem) {
                return response()->json(['error' => 'Product already in cart.']);
            }

            // Add product to the cart
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->title = $product->title;
            $cart->price = $product->price;
            $cart->image = $product->image;
            $cart->quantity = 1;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->save();

            return response()->json(['success' => 'Product added to cart successfully.']);
        } else {
            return response()->json(['error' => 'User not authenticated.']);
        }
    }


    public function view_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $carts = cart::where('user_id', '=', $id)->get();
            return view('user.pages.cart', compact('carts'));
        } else {
            return redirect('login');
        }
    }


    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back()->with('error', 'Product removed from cart!');
    }

    public function cash_on_delivery()
    {
        $user = Auth::user();
        $userid = $user->id;

        $data = cart::where('user_id', '=', $userid)->get();
        foreach ($data as $data) {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->title = $data->title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->prodct_id;

            $order->payment_status = 'Cash On Delivery';
            $order->delivery_status = 'Processing';
            $order->save();

        }
        return redirect()->back();
    }
}
