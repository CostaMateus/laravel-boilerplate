<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Show the application welcome.
     *
     * @return Renderable
     */
    public function welcome() : Renderable
    {
        return view( "welcome" );
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function dashboard() : Renderable
    {
        return view( "pages.dashboard" );
    }

    /**
     * Show the application safe area.
     *
     * @return Renderable
     */
    public function safeArea() : Renderable
    {
        return view( "pages.safe-area" );
    }

    /**
     * Show the application level 1.
     *
     * @return Renderable
     */
    public function level1() : Renderable
    {
        return $this->level( 1 );
    }

    /**
     * Show the application level 2.
     * @return Renderable
     */
    public function level2() : Renderable
    {
        return $this->level( 2 );
    }

    /**
     * Show the application level 3.
     *
     * @return Renderable
     */
    public function level3() : Renderable
    {
        return $this->level( 3 );
    }

    /**
     * Show the application level {$number}.
     * @return Renderable
     */
    public function level( string $number ) : Renderable
    {
        return view( "pages.level", compact( "number" ) );
    }
}
