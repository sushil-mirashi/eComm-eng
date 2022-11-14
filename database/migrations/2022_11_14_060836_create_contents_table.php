<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::drop('contents');
        // exit();
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->longText('description');
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}