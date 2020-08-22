<?php

namespace App\Http\Controllers;

use App\Gift;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('home', compact('user'));
    }

    public function showStore()
    {
        $user = User::findOrFail(auth()->user()->id);
        $gifts = Gift::where('price', '<=', $user->score)->orderBy('price', 'asc')->get();
        return view('store', compact('gifts', 'user'));
    }

    public function showMyGifts()
    {
        $user = User::findOrFail(auth()->user()->id);
        $gifts = Gift::where('price', '<=', $user->score)->get();
        return view('store', compact('gifts', 'user'));
    }
}
