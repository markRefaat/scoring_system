<?php

namespace App\Http\Controllers;

use App\Gift;
use App\User;
use App\Settings;
use Illuminate\Http\Request;

class UserController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth');
    }

    public function redeem(Request $request)
    {
        $user=User::findOrFail(auth()->user()->id);
        $buyGifts=Settings::where('setting','=','buygift')->first(['value','setting']);
        if($buyGifts->value == 'true'){
            $request->validate([
                'gift'=>'required|exists:gifts,id'
            ]);
            $gift=Gift::findOrFail($request->gift);
            if($gift->price <= $user->score){
                try {
    
                    $user->gifts()->attach($request->gift ,['user_name'=>$user->name , 'gift_name'=>$gift->name]);
                    $user->score=$user->score - $gift->price;
                    $user->save();
                    return redirect()->back()->with('status', 'تم شراء الهدية');
                } catch (ModelNotFoundException $e) {
                    return redirect()->back()->with('error', 'حدث خطأ برجاء اعدة المحاولة');
                }
    
            }else return redirect()->back()->with('error', 'لا يمكنك شراء هذه الهدية');
        }
        else{
            return redirect()->back()->with('error', 'لا يمكنك شراء هدايا  الآن');
        }


    }

    public function myGifts()
    {   $returnGifts=Settings::where('setting','=','returngift')->first(['value','setting']);
        $user=User::findOrFail(auth()->user()->id);
        $gifts=$user->gifts()->get();
        return view('myGifts',compact('gifts','returnGifts'));

    }

    public function returnGift($id) {
        $returnGifts=Settings::where('setting','=','returngift')->first('value');
        if($returnGifts->value == 'true'){
        $user=User::findOrFail(auth()->user()->id);
        $gift=Gift::findOrFail($id);
        try{

        if($user->gifts->contains($id)){
            $count=$user->gifts()->where('gift_id',$id)->get()->count();
          if($count > 1){
            $user->gifts()->detach($id);

            for ($i=0; $i <$count-1 ; $i++) {
                $user->gifts()->attach($gift->id ,['user_name'=>$user->name , 'gift_name'=>$gift->name]);
            }

          }

         else $user->gifts()->detach($id);
          $user->score=$user->score+$gift->price;
          $user->save();
          return redirect()->back()->with('status', 'تم ارجاع الهدية');
        } else {
             return redirect()->back()->with('error', 'أنت لاتملك هذه الهدية');
        }

    } catch (ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'حدث خطأ برجاء اعدة المحاولة');
    }
    } else return redirect()->back()->with('error', 'لا يمكنك ارجاع الهدية الآن');
}

}
