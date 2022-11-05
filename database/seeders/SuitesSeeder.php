<?php

namespace Database\Seeders;

use App\Models\content\Suite;
use App\Models\content\Section;
use Illuminate\Database\Seeder;

class SuitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = Section::all();
        foreach ($sections as $section) {
            $suites = Suite::factory(rand(20, 30))->make();
            $section->suites()->saveMany($suites);
        }
    }
}
