<?php

namespace App\Http\Controllers;

use App\Settings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;
use League\Csv\Statement;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $settings = Settings::where('setting', '=', 'buygift')->orwhere('setting', '=', 'returngift')->get();
        return view('adminHome', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $validatedData = $request->validate([
            'buygift' => 'in:on,off',
            'returngift' => 'in:on,off',
        ]);
        if (array_key_exists('buygift', $validatedData)) {
            Settings::where('setting', '=', 'buygift')->update(['value' => 'true']);
        } else {
            Settings::where('setting', '=', 'buygift')->update(['value' => 'false']);
        }

        if (array_key_exists('returngift', $validatedData)) {
            Settings::where('setting', '=', 'returngift')->update(['value' => 'true']);
        } else {

            Settings::where('setting', '=', 'returngift')->update(['value' => 'false']);
        }
        return redirect('adminHome')->with('status', 'updated successfully');
    }


    public function updateScore(Request $request)
    {


         $request->validate([
            'sheet' => 'required|file|mimes:csv,txt',
            'password' => 'required|string|max:30',
        ]);
        $password = Settings::firstWhere('setting', 'auth');
        if (!Hash::check($request->password, $password->value))
            return redirect()->back()->with('error', 'worng password');


        $file = $request->file('sheet');
        $csv = Reader::createFromFileObject($file->openFile());
        $stmt = Statement::create()->offset(1)->limit(470);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            if ($record[4] != 0) //1
            {
                $user = User::firstWhere('username', $record[2]); //0
                if ($user->staticScore != $record[4]) //1
                {
                    $newscore = $record[4] - $user->staticScore;
                    $user->score += $newscore;
                    $user->staticScore = $record[4]; //1 
                    $user->save();
                }
            }
        }
        return redirect()->back()->with('status', 'scores updated successfuly');
    }
}
