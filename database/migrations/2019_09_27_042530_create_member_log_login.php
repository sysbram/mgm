<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberLogLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_log_login', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid_member');
            $table->timestamp('waktu_login');
            $table->timestamp('waktu_logout');
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
        Schema::dropIfExists('member_log_login');
    }
}
