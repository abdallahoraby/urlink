<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->string('title');
            $table->text('content');
            $table->string('type');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();

            $table->unique('slug');
        });

        DB::table('pages')->insert([
            'title' => 'home',
            'content' => '',
            'type' => 'page',
            'slug' => ''
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
