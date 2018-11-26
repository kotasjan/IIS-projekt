<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price');
            $table->date('dateOfManufacture');
            $table->integer('worn');
            $table->string('size');
            $table->string('color');
            $table->boolean('availability')->default(false);
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('employee_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('type_id')->references('id')->on('costume_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costumes');
    }
}
