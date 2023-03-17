<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_images', function (Blueprint $table) {
            $table->bigIncrements('slide_image_id');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->string('image_url');

            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('section_id')->on('landing_page_sections');

/*             $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('landing_page_id')->on('landing_pages'); */

            $table->softDeletes();
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
        Schema::dropIfExists('slider_images');
    }
}
