<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typesId = Type::all()->pluck('id'); // Get all types Id from Type Model

        // Save an array of projects
        $projects = [
            [
                'name' => 'Website Redesign',
                'description' => 'A complete overhaul of the client\'s website with a focus on modern UX/UI.',
                'start_date' => '2024-01-15',
                'end_date' => '2024-03-15',
                'project_manager' => 'Alice Johnson',
            ],
            [
                'name' => 'API Integration',
                'description' => 'Development of RESTful APIs for integration with third-party services.',
                'start_date' => '2024-02-01',
                'end_date' => '2024-04-01',
                'project_manager' => 'Bob Smith',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'A cross-platform mobile application targeting iOS and Android users.',
                'start_date' => '2024-03-01',
                'end_date' => '2024-06-01',
                'project_manager' => 'Chris Lee',
            ],
            [
                'name' => 'Data Migration',
                'description' => 'Migration of legacy data to a new, scalable database infrastructure.',
                'start_date' => '2024-04-15',
                'end_date' => '2024-07-15',
                'project_manager' => 'Dana White',
            ],
            [
                'name' => 'E-commerce Platform',
                'description' => 'A full-stack development of a new e-commerce platform with payment integrations.',
                'start_date' => '2024-05-01',
                'end_date' => '2024-08-01',
                'project_manager' => 'Evan Green',
            ],
            [
                'name' => 'CI/CD Implementation',
                'description' => 'Setting up CI/CD pipelines to automate testing and deployment.',
                'start_date' => '2024-06-15',
                'end_date' => '2024-09-15',
                'project_manager' => 'Fay Lin',
            ],
        ];


        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($typesId);
            $newProject->name = $project['name'];
            $newProject->description = $project['description'];
            $newProject->start_date = $project['start_date'];
            $newProject->end_date = $project['end_date'];
            $newProject->project_manager = $project['project_manager'];
            $newProject->save();

        }

    }
}
