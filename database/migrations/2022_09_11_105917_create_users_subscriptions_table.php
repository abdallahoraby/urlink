<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_subscriptions', function (Blueprint $table) {
            $table->bigIncrements('subscription_id');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->date('subscription_start_date');
            $table->date('subscription_end_date');
            $table->enum('subscription_status', ['0', '1'])->default('1');
            $table->decimal('subscription_amount', 10, 2)->default(0);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');

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
        Schema::dropIfExists('users_subscriptions');
    }
}
