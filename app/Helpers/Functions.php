<?php

use Illuminate\Http\JsonResponse;

if ( ! function_exists( "response_json" ) )
{
    /**
     * Generate a JSON response.
     *
     * @param string $message
     * @param int    $status
     * @param array  $data
     *
     * @return JsonResponse
     */
    function response_json( string $message = "Ok", int $status = 200, array $data = [] ) : JsonResponse
    {
        return response()->json(
            status: $status,
            data: [
                "success" => $status === 200,
                "message" => $message,
                "data" => $data,
            ],
        );
    }
}

if ( ! function_exists( "is_submenu_active" ) )
{
    /**
     * Check if a submenu item is active.
     *
     * @param array $item
     *
     * @return bool
     */
    function is_submenu_active( array $item ) : bool
    {
        if ( isset( $item[ "href" ] ) && request()->routeIs( $item[ "href" ] ) )
            return true;

        if ( ! empty( $item[ "submenu" ] ) )
            foreach ( $item[ "submenu" ] as $subitem )
                if ( is_submenu_active( $subitem ) )
                    return true;

        return false;
    }
}
