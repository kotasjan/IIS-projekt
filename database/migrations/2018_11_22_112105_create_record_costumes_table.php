<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordCostumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_costumes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('borrowing_id');
            $table->unsignedInteger('costume_id');
            $table->timestamps();

            $table->foreign('borrowing_id')->references('id')->on('borrowings');
            $table->foreign('costume_id')->references('id')->on('costumes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_costumes');
    }
}
