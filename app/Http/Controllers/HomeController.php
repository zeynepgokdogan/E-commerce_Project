<?php

namespace App\Http\Controllers;

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
                return view('user.pages.home');
            }
        } else {
            return redirect()->route('login'); 
        }
    }
}
