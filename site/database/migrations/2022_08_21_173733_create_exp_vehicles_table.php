<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exp_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('motor_name')->nullable();
            $table->string('motor_no')->nullable();
            $table->string('info')->nullable();
            $table->decimal('fuel')->nullable();
            $table->decimal('maint')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('paper_work')->nullable();
            $table->date('date');


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
        Schema::dropIfExists('exp_vehicles');
    }
}
