<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user"s email address as verified.
     *
     * @param EmailVerificationRequest $email_verification_request
     *
     * @return RedirectResponse
     */
    public function __invoke( EmailVerificationRequest $email_verification_request ) : RedirectResponse
    {
        if ( $email_verification_request->user()->hasVerifiedEmail() )
            return redirect()->intended( route( "dashboard", absolute: false ) . "?verified=1" );

        if ( $email_verification_request->user()->markEmailAsVerified() )
            event( new Verified( $email_verification_request->user() ) );

        return redirect()->intended( route( "dashboard", absolute: false ) . "?verified=1" );
    }
}
