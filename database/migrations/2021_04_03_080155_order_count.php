<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('choco_order_dets', function (Blueprint $table) {
            //
            $table->integer('order_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('choco_order_dets', function (Blueprint $table) {
        //    $table->dropColumn('order_count');
            //
        });
    }
}
