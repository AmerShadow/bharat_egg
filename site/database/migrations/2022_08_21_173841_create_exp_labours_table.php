<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpLaboursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exp_labours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->biginteger('mobileno')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->decimal('payment')->nullable();
            $table->decimal('advance')->nullable();
            $table->decimal('balance')->nullable();
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
        Schema::dropIfExists('exp_labours');
    }
}
