<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_kh');
            $table->integer('users_id')->unsigned()->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('diachi');
            $table->string('email')->nullable();
            $table->string('sdt');
            $table->string('tongtien');
            $table->string('ghichu')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('don_hang');
    }
}
