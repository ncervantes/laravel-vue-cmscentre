<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category_id');
            $table->string('section');
            $table->integer('max_age');
            $table->integer('min_age');
            $table->date('start_date');
            $table->date('end_date');            
            $table->string('main_image')->nullable();
            $table->string('registration_url')->nullable();
            $table->string('forms_url')->nullable();
            $table->string('camp_site_map_url')->nullable();
            $table->text('listing_blurb')->nullable();
            $table->text('short_blurb')->nullable();
            $table->text('long_blurb')->nullable();
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
        Schema::dropIfExists('camps');
    }
}
