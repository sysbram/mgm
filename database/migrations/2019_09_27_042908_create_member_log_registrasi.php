<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberLogRegistrasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_log_registrasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid_member');
            $table->timestamp('waktu');
            $table->smallInteger('id_session');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_log_registrasi');
    }
}
