<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Support\Renderable;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return Renderable
     */
    public function create() : Renderable
    {
        return view( "auth.login" );
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $login_request
     *
     * @return RedirectResponse
     */
    public function store( LoginRequest $login_request ) : RedirectResponse
    {
        $login_request->authenticate();

        $login_request->session()->regenerate();

        return redirect()->intended( route( "dashboard", absolute: false ) );
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function destroy( Request $request ) : RedirectResponse
    {
        Auth::guard( "web" )->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect( "/" );
    }
}
