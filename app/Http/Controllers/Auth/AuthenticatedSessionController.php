<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        //ambil semua data user
        $home = User::where('username', $request['username'])->first();
        $request->session()->put('username', $home->username);
        $request->session()->put('foto', $home->foto);

        //cek apakah aktif
        if ($home->is_active == 1) {
            //cek apakah admin
            if ($home->is_admin == 1) {
                return redirect()->intended(RouteServiceProvider::HOME_ADMIN);
            } else {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } else {
            return redirect()->intended(RouteServiceProvider::LOGIN)->with('pesan', 'Anda belum aktif, mintalah aktifasi pada Admin');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
