<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param Request $request
     *
     * @return RedirectResponse|View
     */
    public function __invoke( Request $request ) : RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended( route( "dashboard", absolute: false ) )
                    : view( "auth.verify" );
    }
}
