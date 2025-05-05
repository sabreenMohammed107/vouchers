<?php

use Database\Seeders\CouponsSeeder;
use Database\Seeders\CoursesTableSeeder;
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
        $this->call(CouponsSeeder::class);
        $this->call(CoursesTableSeeder::class);
    }
}
