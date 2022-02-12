<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChocoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choco_details', function (Blueprint $table) {
            $table->id();
            $table->string('color');
            $table->string('label');
            $table->string('typeFilling');
            $table->integer('choco_id')->unsigned();
            $table->foreign('choco_id')->references('id')->on('chocos');
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
        Schema::dropIfExists('choco_details');
    }
}
