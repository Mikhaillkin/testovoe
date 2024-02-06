<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TeacherSeeder::class,
            StudentSeeder::class,
            SubjectSeeder::class,
            GradeSeeder::class,
            StudentSubjectSeeder::class,
            TeacherSubjectSeeder::class
        ]);
    }
}
