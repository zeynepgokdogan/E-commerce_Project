<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{

    public function category()
    {
        $data=category::all();
        return view('admin.pages.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;
        $data->category_name = $request->category_name;
        $data->save();
        return redirect()->back()->with('message', 'Category added succesfully.');
    }

    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category deleted succesfully.');
    }
}
