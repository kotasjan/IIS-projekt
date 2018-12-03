<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_accessories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('borrowing_id');
            $table->unsignedInteger('accessory_id');
            $table->timestamps();

            $table->foreign('borrowing_id')->references('id')->on('borrowings')->onDelete('cascade');;
            $table->foreign('accessory_id')->references('id')->on('accessories')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_accessories');
    }
}
