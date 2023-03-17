<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPageLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page_links', function (Blueprint $table) {
            $table->bigIncrements('link_id');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->string('link_type');
            $table->string('link_name');
            $table->string('link_url');
            
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
        Schema::dropIfExists('landing_page_links');
    }
}
