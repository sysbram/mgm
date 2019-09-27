<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('menu_id');
            $table->integer('read');
            $table->integer('edit');
            $table->integer('delete');
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
        Schema::dropIfExists('access_admins');
    }
}
