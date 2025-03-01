<?php

namespace Database\Seeders;

use App\StatusType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            'outlet_id' => 1,
            'status' => StatusType::Pending->value,
            'schedule_date' => date('Y-m-d', strtotime(now().' + 14 days')),
            'max_quantity' => 100,
            'available_quantity' => 75,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('schedules')->insert([
            'outlet_id' => 2,
            'status' => StatusType::Pending->value,
            'schedule_date' => date('Y-m-d', strtotime(now().' + 16 days')),
            'max_quantity' => 100,
            'available_quantity' => 100,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
