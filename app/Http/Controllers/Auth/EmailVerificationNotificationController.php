<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store( Request $request ) : RedirectResponse
    {
        if ( $request->user()->hasVerifiedEmail() )
            return redirect()->intended( route( "dashboard", absolute: false ) );

        $request->user()->sendEmailVerificationNotification();

        return back()->with( "status", "verification-link-sent" );
    }
}
