<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\ValidationException;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @return Renderable
     */
    public function show() : Renderable
    {
        return view( "auth.passwords.confirm" );
    }

    /**
     * Confirm the user's password.
     *
     * @param Request $request
     *
     * @throws ValidationException
     *
     * @return RedirectResponse
     */
    public function store( Request $request ) : RedirectResponse
    {
        $credentials = [
            "email" => $request->user()->email,
            "password" => $request->input( "password" ),
        ];

        if ( ! Auth::guard( "web" )->validate( $credentials ) )
            throw ValidationException::withMessages( ["password" => __( "auth.password" )] );

        $request->session()->put( "auth.password_confirmed_at", time() );

        return redirect()->intended( route( "dashboard", absolute: false ) );
    }
}
