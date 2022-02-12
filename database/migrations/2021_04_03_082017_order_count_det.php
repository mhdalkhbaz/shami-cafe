<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderCountDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('choco_orders', function (Blueprint $table) {
            //
            $table->integer('order_count_id')->unsigned()->after('id');
            $table->foreign('order_count_id')->references('id')->on('choco_order_dets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('choco_orders', function (Blueprint $table) {
            //
        });
    }
}
