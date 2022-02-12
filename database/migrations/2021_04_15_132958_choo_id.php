<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChooId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('choco_orders', function (Blueprint $table) {

            $table->integer('ch_id')->unsigned()->after('id');
            $table->foreign('ch_id')->references('id')->on('choco_order_dets');        
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
