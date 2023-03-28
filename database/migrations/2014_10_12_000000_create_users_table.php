<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\CustomClass\Hashed;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
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
        \DB::statement('UPDATE users SET user_id = id');

        $hashPass = new Hashed();
        DB::table('users')->insert([
            'full_name' => 'zanaty', 'email' => 'admin@admin.com',
            'password' => bcrypt('password'), 'isAdmin' => 1,
            'user_id' => 1

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
