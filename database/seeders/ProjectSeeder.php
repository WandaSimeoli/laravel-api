<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });
       
        for ($i=0; $i < 20; $i++) { 
            $project = new Project();
            $project->title= fake()->words(5, true);
            $project->slug = Str::of($project->title)->slug('-');
            $project->content= fake()->paragraph(3);
            $randomType = Type::inRandomOrder()->first();
            $project->type_id = $randomType->id;
            $imagePath = fake()->imageUrl();
            $imageContent= file_get_contents($imagePath);
            $newImageName = rand(1000, 9999). '-' .rand(1000, 9999). '-' .rand(1000, 9999). '.png';
            $newImagePath = 'uploads/' .$newImageName;
            file_put_contents(storage_path('app/public/' .$newImagePath), $imageContent);
            $project->image = $newImagePath;
            $project->save();
        }
    }
}
