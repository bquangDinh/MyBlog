<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->char('title',100);
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('article_language');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('article_type');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->unsignedBigInteger('cover_id')->nullable();
            $table->foreign('cover_id')->references('id')->on('media');
            $table->string('content');
            $table->string('description')->nullable();
            $table->integer('duration');
            $table->string('project_source_file');
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
        Schema::dropIfExists('project');
    }
}
