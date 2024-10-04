<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projecst = [
            'Project 1',
            'Project 2',
            'Project 3',
            'Project 4',
            'Project 5',
        ];

        foreach ($projecst as $project) {
            Project::create([
                'name' => $project,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
