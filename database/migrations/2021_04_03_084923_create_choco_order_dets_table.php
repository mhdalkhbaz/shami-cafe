<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChocoOrderDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choco_order_dets', function (Blueprint $table) {
            $table->id();

            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('users');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('choco_orders');

            $table->integer('order_count_id');

            $table->enum('status' , ['جاهز', 'قيد التحضير'])->default('قيد التحضير');
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
        Schema::dropIfExists('choco_order_dets');
    }
}
