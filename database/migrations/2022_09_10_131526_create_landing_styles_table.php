<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_styles', function (Blueprint $table) {
            $table->bigIncrements('style_id');
            $table->string('style_name');
            $table->string('style_image')->nullable();
            $table->boolean('style_default')->default(0);
            $table->enum('style_fee', ['free', 'fee'])->default('free');
            $table->boolean('status')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('landing_styles')->insert(['style_name' => 'landing_page_1', 'style_default' => 1,
        'style_fee' => 'free']);

        DB::table('landing_styles')->insert(['style_name' => 'landing_page_2_without_banner', 'style_fee' => 'free']);

        DB::table('landing_styles')->insert(['style_name' => 'landing_page_3_social_out_line', 'style_fee' => 'free']);

        DB::table('landing_styles')->insert(['style_name' => 'landing_page_4_dark_1', 'style_fee' => 'free']);

        DB::table('landing_styles')->insert(['style_name' => 'landing_page_4_dark_2', 'style_fee' => 'free']);

        DB::table('landing_styles')->insert(['style_name' => 'landing_page_5_social_style_bg', 'style_fee' => 'fee']);

        DB::table('landing_styles')->insert(['style_name' => 'landing_page_5_social_style_out_line', 'style_fee' => 'fee']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_styles');
    }
}
