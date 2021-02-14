<?php

namespace Database\Seeders;

use App\Models\DetailName;
use Illuminate\Database\Seeder;

class DetailNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailName::factory()->count(10)->create();
    }
}
