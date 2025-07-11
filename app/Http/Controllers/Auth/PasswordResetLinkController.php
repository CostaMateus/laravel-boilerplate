<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return Renderable
     */
    public function create() : Renderable
    {
        return view( "auth.passwords.forgot" );
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param Request $request
     *
     * @throws ValidationException
     *
     * @return RedirectResponse
     */
    public function store( Request $request ) : RedirectResponse
    {
        $request->validate( [
            "email" => ["required", "email"],
        ] );

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only( "email" )
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with( "status", __( $status ) )
                    : back()->withInput( $request->only( "email" ) )
                        ->withErrors( ["email" => __( $status )] );
    }
}
