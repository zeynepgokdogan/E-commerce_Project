<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function productsPage()
    {
        $data = Products::all();
        return view('user.pages.products',compact('data'));
    }
}
