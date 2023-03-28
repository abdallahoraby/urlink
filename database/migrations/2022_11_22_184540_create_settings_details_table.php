<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //How??
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->bigIncrements('setting_id');
                $table->string('key');
                $table->longText('value');
                $table->string('type');

                $table->softDeletes();
                $table->timestamps();
            });
        } else {
            Schema::table('settings', function (Blueprint $table) {
                $table->softDeletes();
                $table->string('key')->nullable()->change();
                $table->string('display_name')->nullable()->change();
                $table->longText('value')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
