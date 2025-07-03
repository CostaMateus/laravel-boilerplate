<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get( "/", [HomeController::class, "welcome" ] )->name( "welcome" );

Route::middleware( "auth" )->group( static function () : void
{
    Route::middleware( "verified" )->group( static function () : void
    {
        Route::get( "/dashboard", [HomeController::class, "dashboard" ] )->name( "dashboard" );
        Route::get( "/safe-area", [HomeController::class, "safeArea" ] )->middleware( ["password.confirm"] )->name( "safe.area" );

        Route::get( "/level/1", [HomeController::class, "level1" ] )->name( "level.1" );
        Route::get( "/level/2", [HomeController::class, "level2" ] )->name( "level.2" );
        Route::get( "/level/3", [HomeController::class, "level3" ] )->name( "level.3" );
    } );

    Route::get( "/profile", [ProfileController::class, "edit"] )->name( "profile.edit" );
    Route::patch( "/profile", [ProfileController::class, "update"] )->name( "profile.update" );
    Route::delete( "/profile", [ProfileController::class, "destroy"] )->name( "profile.destroy" );
} );

require __DIR__ . "/auth.php";

Route::get( "{any}", static function ()
{
    return redirect( route( "welcome" ) );
} )->where( "any", ".*" );
