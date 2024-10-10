<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->verifyCaptcha($request);

        event(new Registered($user));

        Auth::login($user);

        Auth::user()->netWorth()->create([
            'net_worth' => 0,
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    private function verifyCaptcha(Request $request)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret_key'),
            'response' => $request->recaptcha_token,
        ]);

        if ( ! $response->successful() || ! $response->json('success')) {
            throw ValidationException::withMessages(['recaptcha' => 'Failed to validate reCAPTCHA']);
        }
        
        Log::info('reCAPTCHA verification attempt', [
            'token'    => substr($request->recaptcha_token, 0, 10).'...',  // Log part of the token for privacy
            'response' => $response->json(),
        ]);
    }
}
