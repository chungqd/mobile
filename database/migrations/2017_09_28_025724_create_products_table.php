<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('hinhanh');
            $table->integer('soluong');
            $table->integer('brands_id')->unsigned();
            $table->foreign('brands_id')->references('id')->on('brands');
            $table->integer('giacu');
            $table->integer('giamoi');
            $table->string('dungluong');
            $table->string('cameratruoc');
            $table->string('camerasau');
            $table->string('ram');
            $table->string('cpu');
            $table->string('hedieuhanh');
            $table->string('baohanh');
            $table->text('mota');
            $table->text('danhgia');
            $table->string('pin');
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
        Schema::dropIfExists('products');
    }
}
