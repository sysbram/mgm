<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLogLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_log_login', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_users');
            $table->timestamp('waktu_login');
            $table->timestamp('waktu_logout');
            $table->smallInteger('waktusession');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_log_login');
    }
}
