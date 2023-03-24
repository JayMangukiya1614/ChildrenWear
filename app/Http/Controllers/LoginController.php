<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class LoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback(Request $req)
    {
        try {
            $user = Socialite::driver('google')->user();
            $exist_user = User::where('google_id', $user->id)->first();
            if ($exist_user) {
                Auth::login($exist_user);
                $Ci_Id = "CI" . (rand(1000, 9999));
                $CI = User::where('CI_ID', '=', $Ci_Id)->first();

                if ($CI) {
                    do {
                        $Ci_Id = "BH" . (rand(1000, 9999));
                    } while ($Ci_Id == $CI);
                }
                $data = User::where('email', $user->email)->first();
                $data->CI_ID = $Ci_Id;
                $data->save();
                $req->Session()->put('ULogin', $data->id);

                return redirect(route('Findex'))->with('success','Google Login Successfully...');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                ]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function home()
    {
        return redirect(route('Findex'));
    }
}
