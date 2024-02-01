<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batches = 500;

        for ($i = 0; $i < $batches; $i++) {
            try {
                DB::beginTransaction();
                Grade::factory()->count(1000)->create();
                DB::commit();
            } catch (Throwable $t) {
                Log::error("Error seed Grades in batch {$i}", [
                    'message' => $t->getMessage(),
                    'file' => $t->getFile(),
                    'line' => $t->getLine(),
                    'trace' => $t->getTraceAsString(),
                ]);
            }
        }
    }
}
