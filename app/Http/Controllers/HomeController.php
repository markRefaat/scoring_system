<?php

namespace App\Http\Controllers;

use App\Gift;
use App\User;
use App\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $rank_data;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->rank_data = $this->Rankinfo(auth()->user()->staticScore);

            return $next($request);
        });
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', '=', auth()->user()->id)->select(['name', 'score', 'staticScore'])->first();
        if ($user->staticScore == 50)
            $welcome = true;
        else $welcome = false;

        $rankData = $this->rank_data;
        return view('home', compact('user', 'welcome', 'rankData'));
    }

    public function showStore()
    {
        $buyGifts = Settings::where('setting', '=', 'buygift')->first('value');
        $user = User::where('id', '=', auth()->user()->id)->select(['name', 'score', 'staticScore'])->first();
        $gifts = Gift::orderBy('price', 'ASC')->get();
        $rankData = $this->rank_data;
        return view('store', compact('gifts', 'user', 'buyGifts', 'rankData'));
    }

    public function showProducts($category)
    {
        $user = User::where('id', '=', auth()->user()->id)->select(['name', 'score', 'staticScore'])->first();
        $buyGifts = Settings::where('setting', '=', 'buygift')->first('value');
        if ($category == 'games')
            $category = 'games';
        else if ($category == 'electronics')
            $category = 'electronics';
        else if ($category == 'chocolates')
            $category = 'Chocolates';
        else if ($category == 'sports')
            $category = 'sports';
        else  return redirect('home')->with('error', 'حدث خطأ ما');
        $gifts = Gift::where('category', '=', $category)->orderBy('price', 'ASC')->get();
        $rankData = $this->rank_data;
        return view('store', compact('gifts', 'user', 'buyGifts', 'rankData'));
    }

    private function Rankinfo($score)
    {
        $max_score = 10000;
        $bronze = 2500;
        $silver = 5000;
        $gold = 8500;
        $plat = 10001;
        $percentage = ($score / $max_score) * 100;
        $Current_rank = '';
        $next_rank = '';
        $points_to_next_rank = '';
        if ($percentage < 15) {
            $Current_rank = "Bronze I";
            $current_rank_max =$bronze;
            $next_rank = "Bronze II";
            $points_to_next_rank = ($max_score * 0.15) - $score;
        } else if ($percentage >= 15 && $percentage < 25) {
            $Current_rank = "Bronze II";
            $current_rank_max =$bronze;
            $next_rank = "Silver I";
            $points_to_next_rank = ($max_score * 0.25) - $score;
        } else if ($percentage >= 25 && $percentage < 37) {
            $Current_rank = "Silver I";
            $current_rank_max =$silver;
            $next_rank = "Silver II";
            $points_to_next_rank = ($max_score * 0.37) - $score;
        } else if ($percentage >= 37 && $percentage < 50) {
            $Current_rank = "Silver II";
            $current_rank_max =$silver;
            $next_rank = "Gold I";
            $points_to_next_rank = ($max_score * 0.50) - $score;
        } else if ($percentage >= 50 && $percentage < 70) {
            $Current_rank = "Gold I";
            $current_rank_max =$gold;
            $next_rank = "Gold II";
            $points_to_next_rank = ($max_score * 0.70) - $score;
        } else if ($percentage >= 70 && $percentage < 85) {
            $Current_rank = "Gold II";
            $current_rank_max =$gold;
            $next_rank = "Platinium I";
            $points_to_next_rank = ($max_score * 0.85) - $score;
        } else if ($percentage >= 85 && $percentage < 95) {
            $Current_rank = "Platinium I";
            $current_rank_max =$plat;
            $next_rank = "Platinium II";
            $points_to_next_rank = ($max_score * 0.95) - $score;
        } else {
            $Current_rank = "Platinium II";
            $current_rank_max =$plat;
            $next_rank = "You reached the highest Rank";
            $points_to_next_rank = 0;
        }
        return array(
            "rank" => $Current_rank,
            "next_rank" => $next_rank,
            "points_to_next" => $points_to_next_rank,
            "current_rank_max"=>$current_rank_max,
            "ranks_start" => [$bronze,$silver,$gold,$plat],
        );
    }
}
