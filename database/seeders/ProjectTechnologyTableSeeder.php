<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use Faker\Generator as Faker;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //prendo tutti i post e tutti i technlogy id -> il pluck prende solo gli id della categoria
        $projects = Project::all();
        $technologyIds = Technology::all()->pluck('id');

        //dico a projects di prendere la relazione con technology e di attaccarci due random technology id tramite faker
        foreach ($projects as $project) {
            $project->technologies()->attach($faker->randomElements($technologyIds, 2));
        }
    }
}
