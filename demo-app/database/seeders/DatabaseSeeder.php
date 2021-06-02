<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\ShippingType;
use App\Models\WarrantyType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Brand::create(['name' => 'evian']);
        Brand::create(['name' => 'volvic']);
        Brand::create(['name' => 'cristaline']);

        WarrantyType::create(['name' => 'Garantie 2 ans', 'content' => 'Garantie 2 Ans']);
        WarrantyType::create(['name' => 'Garantie 1 an', 'content' => 'Garantie 1 An']);

        ShippingType::create(['name' => 'Livaison chronopost à domicile', 'content' => 'Livraison Chronopost à domicile']);
        ShippingType::create(['name' => 'Livaison chronopost en point relais', 'content' => 'Livraison Chronopost en point relais']);
        ShippingType::create(['name' => 'Livaison mondialrelay', 'content' => 'Livraison mondialrelay']);
    }
}
