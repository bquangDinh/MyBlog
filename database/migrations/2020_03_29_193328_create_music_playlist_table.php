<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicPlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*https://stackoverflow.com/questions/32669880/laravel-migration-foreign-key-constraint-is-incorrectly-formed-errno-150*/
        Schema::create('music_playlist', function (Blueprint $table) {
            $table->id();

            //change this to unsigned big interger
            $table->unsignedBigInteger('playlist_id');
            $table->foreign('playlist_id')->references('id')->on('playlist');
            
            $table->unsignedBigInteger('music_id');
            $table->foreign('music_id')->references('id')->on('music');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_playlist');
    }
}
