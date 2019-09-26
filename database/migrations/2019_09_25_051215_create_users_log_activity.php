<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLogActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_log_activity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_users');
            $table->uuid('uid_member');
            $table->timestamp('waktu_proses');
            $table->char('route');
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
        Schema::dropIfExists('users_log_activity');
    }
}
