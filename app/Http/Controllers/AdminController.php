<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        $settings = Settings::where('setting','=','buygift')->orwhere('setting','=','returngift')->get();
        return view('adminHome',compact('settings'));
    }

    public function updateSettings(Request $request){
        $validatedData = $request->validate([
            'buygift' => 'in:on,off',
            'returngift' => 'in:on,off',
        ]);
        $buy = 
        $return = Settings::where('setting','=','returngift')->first();
        if( array_key_exists('buygift',$validatedData) )
        {
            Settings::where('setting','=','buygift')->update(['value'=>'true']);
        }else {
            Settings::where('setting','=','buygift')->update(['value'=>'false']);
        }
        
        if( array_key_exists('returngift',$validatedData) )
        {
            Settings::where('setting','=','returngift')->update(['value'=>'true']);
            
        }else {
            
            Settings::where('setting','=','returngift')->update(['value'=>'false']);
        }
        return redirect('adminHome')->with('status', 'updated successfully');
    }
}
