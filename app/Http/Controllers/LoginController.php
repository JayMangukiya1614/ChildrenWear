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
    public function cllback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $exist_user = User::where('google_id', $user->id)->first();
            if ($exist_user) {
                Auth::login($exist_user);
                return redirect('/Findex');
            }
            else
            {
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
