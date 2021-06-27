<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd(session()->all());
        if (Auth::user()->level_id == 9) {
            return redirect()->route('pengaduan.create');
        } else {
            return redirect()->route('pengaduan.index');
        }
        // return view('home');
    }
}
