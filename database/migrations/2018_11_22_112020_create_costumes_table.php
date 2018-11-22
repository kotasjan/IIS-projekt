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
            $table->string('manufacturer');
            $table->string('material');
            $table->string('description');
            $table->integer('price');
            $table->date('dateOfManufacture');
            $table->integer('worn');
            $table->string('size');
            $table->string('color');
            $table->boolean('availability');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('category_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('category_id')->references('id')->on('categories');
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
