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
        Schema::create( "users", static function ( Blueprint $table ) : void
        {
            $table->id();
            $table->string( "name" );
            $table->string( "email" )->unique();
            $table->timestamp( "email_verified_at" )->nullable();
            $table->string( "password" );
            $table->string( "image" )->nullable();
            $table->rememberToken();
            $table->timestamps();
        } );

        Schema::create( "password_reset_tokens", static function ( Blueprint $table ) : void
        {
            $table->string( "email" )->primary();
            $table->string( "token" );
            $table->timestamp( "created_at" )->nullable();
        } );

        Schema::create( "sessions", static function ( Blueprint $table ) : void
        {
            $table->string( "id" )->primary();
            $table->foreignId( "user_id" )->nullable()->index();
            $table->string( "ip_address", 45 )->nullable();
            $table->text( "user_agent" )->nullable();
            $table->longText( "payload" );
            $table->integer( "last_activity" )->index();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists( "users" );
        Schema::dropIfExists( "password_reset_tokens" );
        Schema::dropIfExists( "sessions" );
    }
};
