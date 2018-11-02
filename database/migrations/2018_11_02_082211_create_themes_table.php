<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('preview')->nullable();
            $table->string('status', 45)->nullable();
            $table->integer('amount_installed')->default(0)->unsigned();
            $table->integer('amount_like')->default(0)->unsigned();
            $table->integer('amount_share')->default(0)->unsigned();
            $table->integer('website_id')->unsigned();
            $table->integer('topic_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            //FK
            $table->foreign('website_id')->references('id')->on('websites')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
