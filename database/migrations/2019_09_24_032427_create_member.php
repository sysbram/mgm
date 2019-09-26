<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->uuid('uid');
            $table->string('nik', 20);
            $table->string('password', 100);
            $table->char('nama');
            $table->char('email');
            $table->smallInteger('id_jenkel');
            $table->char('no_handphone', 14);
            $table->smallInteger('id_status');  
            $table->string('gambar')->nullable();
            $table->char('status_hapus');
            $table->char('status_login');
            $table->timestamp('last_login')->nullable();
            $table->string('referral_code');
            $table->string('referral_code_parent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
