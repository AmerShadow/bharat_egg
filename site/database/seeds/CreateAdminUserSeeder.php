<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $available_stock = User::first();
        if (empty($available_stock)) {
            User::insert([
                "name" => "Super Admin",
                "email" => "superadmin@egg.com",
                "password" => Hash::make(123456)

            ]);
        }
    }
}
