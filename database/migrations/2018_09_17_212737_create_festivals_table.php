<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('title');
            $table->boolean('pagination');
            $table->text('listingblurb');
            $table->text('longblurb');
            $table->integer('affiliation_id');
            $table->string('section'); 
            $table->string('path_thumbnail')->nullable();
            $table->string('path_main')->nullable();         
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
        Schema::dropIfExists('festivals');
    }
}
