<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return Renderable
     */
    public function create() : Renderable
    {
        return view( "auth.register" );
    }

    /**
     * Handle an incoming registration request.
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
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "lowercase", "email", "max:255", "unique:" . User::class],
            "password" => ["required", "confirmed", Rules\Password::defaults()],
        ] );

        $user = User::create( [
            "name" => $request->input( "name" ),
            "email" => $request->input( "email" ),
            "password" => Hash::make( $request->input( "password" ) ),
        ] );

        event( new Registered( $user ) );

        Auth::login( $user );

        return redirect( route( "dashboard", absolute: false ) );
    }
}
