<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create( "cache", static function ( Blueprint $table ) : void
        {
            $table->string( "key" )->primary();
            $table->mediumText( "value" );
            $table->integer( "expiration" );
        } );

        Schema::create( "cache_locks", static function ( Blueprint $table ) : void
        {
            $table->string( "key" )->primary();
            $table->string( "owner" );
            $table->integer( "expiration" );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists( "cache" );
        Schema::dropIfExists( "cache_locks" );
    }
};
