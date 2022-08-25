<?php

use App\BillNumber;
use Illuminate\Database\Seeder;

class BillNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $billNumber = BillNumber::first();
        if (empty($billNumber)) {
            BillNumber::insert([
                "number" => 1,
            ]);
        }
    }
}
