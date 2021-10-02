<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MenusCms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_cms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('parent_id');
            $table->tinyInteger('published')->default(1);
            $table->string('module');
            $table->string('method');
            $table->string('icon');
            $table->integer('order');
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
        Schema::dropIfExists('menus_cms');
    }
}
