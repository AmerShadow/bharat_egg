<?php

use App\BillNumber;
use App\RecNumber;
use Illuminate\Database\Seeder;

class RecNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recNumber = RecNumber::first();
        if (empty($recNumber)) {
            RecNumber::insert([
                "number" => 1,
            ]);
        }
    }
}
