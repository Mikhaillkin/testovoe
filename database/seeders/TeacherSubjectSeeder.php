<?php

namespace Database\Seeders;

use App\Models\TeacherSubject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class TeacherSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            TeacherSubject::factory()->count(10000)->create();
            DB::commit();
        } catch (Throwable $t) {
            DB::rollBack();
            Log::error('Error seed TeacherSubject', [
                'message' => $t->getMessage(),
                'file' => $t->getFile(),
                'line' => $t->getLine(),
                'trace' => $t->getTraceAsString(),
            ]);
        }
    }
}
