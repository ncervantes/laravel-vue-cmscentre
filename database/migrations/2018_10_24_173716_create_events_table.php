<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('listingblurb');
            $table->text('shortblurb');
            $table->text('longblurb');
            $table->string('ticketsURL');
            $table->string('directionsURL');
            $table->integer('festival_id');
            $table->double('prices');
            $table->integer('affiliation_id');
            $table->string('main_path')->nullable();
            $table->string('thumbnail_path')->nullable();
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
        Schema::dropIfExists('events');
    }
}
