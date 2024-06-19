<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteSessionController extends Controller
{
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        try {
            if (!$this->requestHasCode()) {
                return $this->handleFailedAuthentication('Authentication cancelled or failed. Please try again.');
            }

            $socialiteUser = $this->getSocialiteUser($driver);

            $user = $this->findOrCreateUser($driver, $socialiteUser);

            Auth::login($user);

            return redirect()->intended(route('dashboard', absolute: false));
        } catch (Exception $e) {
            return $this->handleFailedAuthentication('Authentication failed. Please try again.');
        }
    }

    protected function requestHasCode()
    {
        return request()->has('code');
    }

    protected function handleFailedAuthentication($error)
    {
        flashToast('error', $error);
        return redirect()->route('login')->with('error', $error);
    }

    protected function getSocialiteUser($driver)
    {
        return Socialite::driver($driver)->user();
    }

    protected function findOrCreateUser($driver, $socialiteUser)
    {
        $user = User::query()
            ->where('provider', $driver)
            ->where('provider_id', $socialiteUser->id)
            ->first();

        if (!$user) {
            $user = $this->createUser($driver, $socialiteUser);
        }

        return $user;
    }

    protected function createUser($driver, $socialiteUser)
    {
        $user = User::create([
            'provider' => $driver,
            'provider_id' => $socialiteUser->id,
            'name' => $socialiteUser->name,
            'email' => $socialiteUser->email,
        ]);

        event(new Registered($user));
        $user->markEmailAsVerified();

        $user->netWorth()->create([
            'net_worth' => 0,
        ]);

        return $user;
    }
}
