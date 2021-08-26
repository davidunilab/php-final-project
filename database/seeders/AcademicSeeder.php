<?php

namespace Database\Seeders;

use App\Models\Academic;
use Illuminate\Database\Seeder;

class AcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Academic::factory()->count(20)->create();
    }
}
