<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TariffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tariffs')->truncate();
        Tariff::factory()->count(10)->create();
    }
}
