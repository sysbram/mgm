
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersBo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_bo', function (Blueprint $table) {
            $table->bigIncrements('uuid');
            $table->string('username')->unique();
            $table->string('email')->uniqe();
            $table->timestamp('email_verifed_at')->nullable();
            $table->string('password');
            $table->string('status_hapus')->deafult('N');
            $table->smallInteger('status_login');
            $table->dateTime('last_login');
            $table->string('foto');
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
        Schema::dropIfExists('user_bo');
    }
}
