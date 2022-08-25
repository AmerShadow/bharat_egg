<?php

use Illuminate\Database\Seeder;
use App\AvbStock;


class AvailableStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $available_stock = AvbStock::first();
        if (empty($available_stock)) {
            AvbStock::insert([
                "quantity" => 0,
                "stock_id" => 1,
                "seller_id" =>1
            ]);
        }
    }
}
