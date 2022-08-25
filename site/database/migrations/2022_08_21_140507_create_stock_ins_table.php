<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('seller_id')->unsigned()->nullable();
            $table->text('bill_type')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('rate')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('payment')->nullable();
            $table->decimal('payment_balance')->nullable();
            $table->integer('empty_t')->nullable();
            $table->integer('balance_t')->nullable();
            $table->integer('deposit_t')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('stock_ins');
    }
}
