<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 25;
        Task::factory()->count($count)->state(
            new Sequence(
                ['finished_at' => null],
                ['finished_at' => fake()->dateTime()]
            )
        )->create();
    }
}
