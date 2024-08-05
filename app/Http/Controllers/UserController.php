<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Products;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

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

        // Check if the cart is empty
        $data = cart::where('user_id', '=', $userid)->get();
        if ($data->isEmpty()) {
            return redirect()->route('user.cart')->with('error', 'Your cart is empty. Please add items to your cart before placing an order.');
        }

        foreach ($data as $item) {
            $order = new Order;
            $order->name = $item->name;
            $order->email = $item->email;
            $order->phone = $item->phone;
            $order->address = $item->address;
            $order->user_id = $item->user_id;
            $order->title = $item->title;
            $order->price = $item->price;
            $order->quantity = $item->quantity;
            $order->image = $item->image;
            $order->product_id = $item->product_id;

            $order->payment_status = 'Cash On Delivery';
            $order->delivery_status = 'Processing';
            $order->save();
        }

        // Clear the cart after placing the order
        cart::where('user_id', '=', $userid)->delete();

        return redirect()->route('user.cart')->with('success', 'Your order has been placed successfully and is being processed.');
    }

    public function pay_using_card($totalprice)
    {
        return view('user.pages.stripe', compact('totalprice'));
    }

    public function stripe_post(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            Stripe\Charge::create([
                "amount" => $request->amount * 100, // Amount should be in cents
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment"
            ]);

            Session::flash('success', 'Payment successful!');
        } catch (\Exception $e) {
            Session::flash('error', 'Payment failed: ' . $e->getMessage());
        }

        return back();
    }
}
