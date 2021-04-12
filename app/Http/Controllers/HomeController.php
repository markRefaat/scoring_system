<?php

namespace App\Http\Controllers;

use App\Gift;
use App\User;
use App\Settings;
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
        $user=User::where('id','=',auth()->user()->id)->select(['name','score','staticScore'])->first();
        if($user->staticScore == 50)
        $welcome =true;
        else $welcome =false;
        return view('home', compact('user','welcome'));
    }

    public function showStore(){
        $buyGifts=Settings::where('setting','=','buygift')->first('value');
        $user=User::where('id','=',auth()->user()->id)->select(['name','score'])->first();
        $gifts=Gift::orderBy('price','ASC')->get();
        return view('store',compact('gifts','user','buyGifts'));
    }

    public function showProducts($category){
        $user=User::where('id','=',auth()->user()->id)->select(['name','score'])->first();
        $buyGifts=Settings::where('setting','=','buygift')->first('value');
        if($category == 'games')
        $category = 'games';
        else if($category == 'electronics')
        $category='electronics';
        else if ($category == 'chocolates')
        $category = 'Chocolates';
        else if ($category == 'sports')
        $category = 'sports';
        else  return redirect('home')->with('error', 'حدث خطأ ما');
        $gifts=Gift::where('category','=' ,$category)->orderBy('price','ASC')->get();
        return view('store',compact('gifts','user','buyGifts'));
    }
    
}
