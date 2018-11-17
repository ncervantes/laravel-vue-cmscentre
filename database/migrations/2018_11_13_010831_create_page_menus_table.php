<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parentId');
            $table->integer('displayOrder');
            $table->string('title');
            $table->string('url');
            $table->string('pageTemplate');
            $table->string('stylesheet');
            $table->string('menutext');
            $table->boolean('displayMenu');
            $table->boolean('displayNews');
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
        Schema::dropIfExists('page_menus');
    }
}
