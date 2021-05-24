<?php

namespace App\Http\Controllers;

use App\Gift;
use App\ReturnHistory;
use App\User;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redeem(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        if ($user->staticScore >= 1000) {
            $buyGifts = Settings::where('setting', '=', 'buygift')->first(['value', 'setting']);
            if ($buyGifts->value == 'true') {
                $request->validate([
                    'gift' => 'required|exists:gifts,id'
                ]);
                $gift = Gift::findOrFail($request->gift);
                if ($gift->price <= $user->score && $gift->quantity > 0) {
                    try {

                        $user->gifts()->attach($request->gift, ['user_name' => $user->name, 'gift_name' => $gift->name, 'user_class' => $user->class]);
                        $user->score = $user->score - $gift->price;
                        $user->save();
                        $gift->quantity-=1;
                        $gift->save();
                        return redirect()->back()->with('status', 'تم شراء الهدية');
                    } catch (ModelNotFoundException $e) {
                        return redirect()->back()->with('error', 'حدث خطأ برجاء اعدة المحاولة');
                    }
                } else return redirect()->back()->with('error', 'لا يمكنك شراء هذه الهدية');
            } else {
                return redirect()->back()->with('error', 'لا يمكنك شراء هدايا  الآن');
            }
        } else {
            return redirect()->back()->with('error', 'الحد الادنى 1000 مومينتو لشراء الهدايا | Minimum score for buying is 1000 momentos');
        }
    }

    public function myGifts()
    {
        $returnGifts = Settings::where('setting', '=', 'returngift')->first(['value', 'setting']);
        $user = User::findOrFail(auth()->user()->id);
        $gifts = $user->gifts()->get();
        return view('myGifts', compact('gifts', 'returnGifts'));
    }

    public function returnGift($id)
    {
        $returnGifts = Settings::where('setting', '=', 'returngift')->first('value');
        if ($returnGifts->value == 'true') {
            $user = User::findOrFail(auth()->user()->id);
            $gift = Gift::findOrFail($id);
            try {

                if ($user->gifts->contains($id)) {
                    $count = $user->gifts()->where('gift_id', $id)->get()->count();
                    DB::delete('delete from gift_user where user_id = ? AND gift_id = ? LIMIT 1', array($user->id, $gift->id));
                    $user->score = $user->score + $gift->price;
                    $user->save();
                    $gift->quantity+=1;
                    $gift->save();
                    ReturnHistory::Create(['user_id' => $user->id, 'gift_id' => $gift->id]);
                    return redirect()->back()->with('status', 'تم ارجاع الهدية');
                } else {
                    return redirect()->back()->with('error', 'أنت لاتملك هذه الهدية');
                }
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'حدث خطأ برجاء اعدة المحاولة');
            }
        } else return redirect()->back()->with('error', 'لا يمكنك ارجاع الهدية الآن');
    }



    public function ranking(){ 
        $users = User::where('class','!=','admins')->where('staticScore','>','0')->orderBy('class','ASC')->select('class','staticScore')->get();

        $grouped = $users->mapToGroups(function ($item, $key) {
            return [$item['class'] => $item['staticScore']];
        });
 
        $groupedSum = $grouped->map(function ($item, $key) {
            return $item->sum() / count($item);
        });
        $top_five = $groupedSum->sort()->reverse()->slice(0,5);
       
        $score_bigger = User::where("StaticScore",'>',auth()->user()->staticScore)->orderBy('StaticScore','ASC')->select('name','class','staticScore')->limit(3)->get();
        $score_smaller = User::where("StaticScore",'<',auth()->user()->staticScore)->orderBy('StaticScore','DESC')->select('name','class','staticScore')->limit(3)->get();
        $score_bigger = $score_bigger->reverse();
       
        return view('scoringBoard',compact('top_five','score_bigger','score_smaller'));
    }

}
