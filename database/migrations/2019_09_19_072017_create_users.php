<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid')->nullable();
            $table->string('name')->nullable();
            $table->string('occupation')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verifed_at')->nullable();
            $table->string('password')->nullable();
            $table->char('no_hp',14)->nullable();
            $table->string('foto')->nullable();
            $table->integer('status_login')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->integer('status_admin')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
