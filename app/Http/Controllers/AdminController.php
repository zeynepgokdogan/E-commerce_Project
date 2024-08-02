<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
    public function category()
    {
        $data = Category::all();
        return view('admin.pages.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        // Form verilerini doğrulama
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $data = new Category;
        $data->category_name = $request->category_name;
        $data->save();
        return redirect()->back()->with('message', 'Category added successfully.');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with('message', 'Category deleted successfully.');
        }

        return redirect()->back()->with('error', 'Category not found.');
    }

    public function view_product1()
    {
        $category = Category::all();
        return view('admin.pages.productpage_1', compact('category'));
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Products;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imagename);
            $product->image = $imagename;
        }

        $product->save();
        return redirect()->back()->with('message', 'Product added successfully.');
    }

    public function view_product2()
    {
        $product = Products::all();
        return view('admin.pages.productpage_2', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Products::find($id);

        if ($product) {
            // Delete associated image file if it exists
            if ($product->image && file_exists(public_path('product/' . $product->image))) {
                unlink(public_path('product/' . $product->image));
            }

            $product->delete();
            return redirect()->back()->with('message', 'Product deleted successfully.');
        }

        return redirect()->back()->with('error', 'Product not found.');
    }

    public function view_product3($id)
    {
        $product = Products::find($id);

        if ($product) {
            $categories = Category::all();
            return view('admin.pages.productpage_3', compact('product', 'categories'));
        }

        return redirect()->back()->with('error', 'Product not found.');
    }

    public function update_product(Request $request, $id)
    {
        // Validation rules updated to handle numeric values
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Products::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            // Delete old image file if it exists
            if ($product->image && file_exists(public_path('product/' . $product->image))) {
                unlink(public_path('product/' . $product->image));
            }

            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->route('admin.view_product3', ['id' => $product->id])
            ->with('message', 'Product updated successfully.');
    }
}
