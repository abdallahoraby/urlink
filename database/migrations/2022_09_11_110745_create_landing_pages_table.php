<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {

            $table->bigIncrements('landing_page_id');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->string('page_name');
            $table->string('page_subdomain');
            $table->string('page_title');
            $table->string('page_profile_icon');
            $table->string('page_profile_banner')->nullable();
            $table->string('page_contact_email');
            $table->string('page_contact_phone');
            $table->string('page_brief')->nullable();
            $table->text('page_desc')->nullable();
            $table->string('page_country');
            $table->string('page_city');


            $table->unsignedInteger('page_hits')->default(0);
            $table->enum('page_status', ['draft', 'active', 'suspended', 'deleted'])->default('active');
            $table->enum('page_account_type', ['individual', 'organization']);
            $table->string('page_url')->unique();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('style_id');
            $table->foreign('style_id')->references('style_id')->on('landing_styles');

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
        Schema::dropIfExists('landing_pages');
    }
}
