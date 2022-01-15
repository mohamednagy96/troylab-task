<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    // protected $seeder = SchoolTableSeeder::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::factory()
        ->has(Student::factory()->count(3))
        ->create();

        // School::factory()->count(20)->create();
    }
}
