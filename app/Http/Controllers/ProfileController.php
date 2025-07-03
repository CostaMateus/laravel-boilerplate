<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Support\Renderable;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param Request $request
     *
     * @return Renderable
     */
    public function edit( Request $request ) : Renderable
    {
        return view( "pages.profile.edit", [
            "user" => $request->user(),
        ] );
    }

    /**
     * Update the user's profile information.
     *
     * @param ProfileUpdateRequest $profile_update_request
     *
     * @return RedirectResponse
     */
    public function update( ProfileUpdateRequest $profile_update_request ) : RedirectResponse
    {
        $profile_update_request->user()->fill( $profile_update_request->validated() );

        if ( $profile_update_request->user()->isDirty( "email" ) )
            $profile_update_request->user()->email_verified_at = null;

        $profile_update_request->user()->save();

        return Redirect::route( "profile.edit" )->with( "status", "profile-updated" );
    }

    /**
     * Delete the user's account.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function destroy( Request $request ) : RedirectResponse
    {
        $request->validateWithBag( "userDeletion", [
            "password" => ["required", "current_password"],
        ] );

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to( "/" );
    }
}
