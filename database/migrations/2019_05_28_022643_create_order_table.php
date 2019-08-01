<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->Increments('order_id');
            $table->integer('user_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->date('date');
            $table->text('chuan_doan');
            $table->text('nguyen_nhan');
            $table->text('dieu_tri');
            $table->text('don_thuoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
