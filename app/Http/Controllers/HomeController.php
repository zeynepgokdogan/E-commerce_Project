<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $user = Auth::user();

        if ($user) {
            $usertype = $user->usertype;

            if ($usertype == 'admin') {
                return view('admin.pages.home');
            } else {
                $data = Products::paginate(3);
                return view('user.pages.home', compact('data'));
            }
        } else {
            return redirect()->route('login'); 
        }
    }
}
