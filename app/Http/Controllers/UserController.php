<?php

namespace App\Http\Controllers;

use App\Gift;
use App\User;
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

    public function myGifts()
    {
        $user=User::findOrFail(auth()->user()->id);
        $gifts=$user->gifts()->get();
        return view('myGifts',compact('user','gifts'));

    }

    public function returnGift($id) {
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
             return redirect()->back()->with('error', 'انت لاتملك هذه الهدية');
        }

    } catch (ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'حدث خطأ برجاء اعدة المحاولة');
    }
    }

    // public function searchview(){
    //     if(auth()->user()->id== 259)
    //     return view('search');
    // }

    // public function search(Request $request){
    //     if(auth()->user()->id== 259){
    //         $text = $request->input('text');
    //         $users = User::select('id','name','username','staticScore','recieved_gifts')->with('gifts')->Where('name', 'like', '%' .$text. '%')->orWhere('username', 'like', '%' .$text. '%')->orderBy('recieved_gifts','ASC')->orderBy('name','ASC')->get();
    //         return response()->json($users);
    //     }

    // }


    // public function buy(Request $request){
    //     if(auth()->user()->id== 259){
    //         $text = $request->input('text');
    //         $user = user::findOrFail($text);
    //         $value=!$user->recieved_gifts;
    //         $user->recieved_gifts = !$user->recieved_gifts;
    //         $user->save();
    //         return response()->json($value);
    //     }

    // }
}
