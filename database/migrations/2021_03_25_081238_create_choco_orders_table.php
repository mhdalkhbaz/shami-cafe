<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChocoordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choco_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('chocodetails_id');
            $table->string('order_count');
            $table->string('choco_name');
            $table->string('color');
            $table->string('label');
            $table->string('typeFilling');
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
        Schema::dropIfExists('chocoorders');
    }
}
