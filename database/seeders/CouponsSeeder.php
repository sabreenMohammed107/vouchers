<?php

namespace Database\Seeders;

use App\Models\Coupon_data;
use Database\Factories\CouponFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 100;
        Coupon_data::factory()->count(100)->create(['discount_per' => 10]);
        Coupon_data::factory()->count(50)->create(['discount_per' => 5]);
        Coupon_data::factory()->count(25)->create(['discount_per' => 15]);
        Coupon_data::factory()->count(25)->create(['discount_per' => 20]);

    }
}
