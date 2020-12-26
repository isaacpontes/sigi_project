<?php

namespace App\Http\Controllers\Auth;

use App\Church;
use App\Http\Controllers\Controller;
use App\User;
use App\Providers\RouteServiceProvider;
use App\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $one_week = strtotime("+7 day");
        $church = Church::create([
            'name' => 'Minha Igreja',
            'email' => $request->email,
            'plan' => '1',
            'expiration' => date('Y-m-d', $one_week),
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'system_admin' => false,
            'church_admin' => true,
            'finances_admin' => true,
            'members_admin' => true,
            'church_id' => $church->id,
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
