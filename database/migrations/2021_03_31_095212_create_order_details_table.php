<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();

            // $table->integer('branch_id')->unsigned();
            // $table->foreign('branch_id')->references('id')->on('users');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('choco_orders');

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
        // Schema::dropIfExists('order_details');
        // $table->dropColumn('branch_id');
    }
}
