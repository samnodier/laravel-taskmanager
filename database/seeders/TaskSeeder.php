<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'name' => 'Task 1',
            'project_id' => '1',
            'priority' => 1,
        ]);

        Task::create([
            'name' => 'Task 2',
            'project_id' => '2',
            'priority' => 2,
        ]);

        Task::create([
            'name' => 'Task 3',
            'project_id' => '4',
            'priority' => 3,
        ]);

        Task::create([
            'name' => 'Task 4',
            'project_id' => '3',
            'priority' => 4,
        ]);

        Task::create([
            'name' => 'Task 5',
            'project_id' => '2',
            'priority' => 5,
        ]);

        Task::create([
            'name' => 'Task 6',
            'project_id' => '1',
            'priority' => 6,
        ]);

        Task::create([
            'name' => 'Task 7',
            'project_id' => '1',
            'priority' => 7,
        ]);
    }
}
