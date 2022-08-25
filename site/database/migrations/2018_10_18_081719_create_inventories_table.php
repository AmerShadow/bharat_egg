<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fruit_name');
            $table->integer('cate_id');
            $table->integer('quantity');
            $table->float('p_price');
            $table->string('seller');
            $table->integer('p_a');
            $table->integer('p_b');
            $table->integer('p_c');
            $table->integer('end_limit');
            $table->date('p_date');
            $table->float('expense');
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
        Schema::dropIfExists('inventories');
    }
}
