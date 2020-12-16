<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $user = User::firstOrCreate(
            ['email' => $user->email],
            [
                'name' => $user->name,
                'email' => $user->email,
                'facebook_id' => $user->id,
                'password' => encrypt('123456dummy')
            ]
        );

        Auth::login($user, true);
        return redirect()->route('dashboard');

    }
}
