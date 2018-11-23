<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nameOfEvent")->default('');
            $table->integer('numberOfCostumes')->default(0);
            $table->integer('numberOfAccessories')->default(0);
            $table->date('dateOfRental');
            $table->integer('totalPrice')->default(0);
            $table->boolean('isFinished')->default(false);
            $table->boolean('isCurrent')->default(true);
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
}
