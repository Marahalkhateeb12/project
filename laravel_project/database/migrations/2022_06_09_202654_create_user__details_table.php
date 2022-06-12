<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_detail_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('password');
            $table->string('user_image');
            $table->string('user_address');
            $table->string('user_mobile');
            $table->integer('admin_flag');
            $table->timestamps();

            $table->foreign('user_detail_id')->on('users')->references('id')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user__details');
    }
}
