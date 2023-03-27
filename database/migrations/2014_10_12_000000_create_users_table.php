<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\CustomClass\Hashed;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // How !
            $table->bigIncrements('user_id');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            // $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('subscription', ['free', 'paid'])->default('free');
            $table->boolean('status')->default(1);

            $table->boolean('should_re_login')->default(0);
            $table->boolean('isAdmin')->default(0);

            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
        $hashPass = new Hashed();
        $hashPass->set_pass('fahad123', 'fahad@fcode.sa');
        $hash = $hashPass->get_hash();
        $password = Hash::make($hash);
        DB::table('users')->insert(['full_name' => 'Mr-Fahad', 'email' => 'fahad@fcode.sa',
            'password' => $password, 'isAdmin' => 1
    ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
