<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPageSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    { 
        Schema::create('landing_page_sections', function (Blueprint $table) {
            $table->bigIncrements('section_id');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->enum('section_type', ['image', 'slider', 'youtube', 'vimeo', 'soundcloud', 'map', 'text'])->default('text');
            $table->boolean('display_order')->default(1);
            $table->string('section_title');
            $table->text('section_content')->nullable();

            $table->string('youtube_url')->nullable();
            $table->string('vimeo_url')->nullable();
            $table->string('image_url')->nullable();
            $table->string('soundcloud_url')->nullable();
            $table->string('map_location')->nullable();

            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('landing_page_id')->on('landing_pages');

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
        Schema::dropIfExists('landing_page_sections');
    }
}
