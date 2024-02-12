<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = include base_path('data/projects.php');
        foreach ($projects as $projectData) {
            $project = new Project();
            $project->title = $projectData['title'];
            $project->category = $projectData['category'];
            $project->status = $projectData['status'];
            $project->thumb = $projectData['thumb'];
            $project->language = $projectData['language'];
            $project->slug = Str::slug($projectData['title']);
            $project->save();
        };
    }
}
