<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Seed projects
        Project::create([
            'name' => 'Important Project'
        ]);
        Project::create([
            'name' => 'Project 2'
        ]);
        Project::create([
            'name' => 'Project 2 Copy'
        ]);
        Project::create([
            'name' => 'Unfinished version of Important Project'
        ]);
    }
}
