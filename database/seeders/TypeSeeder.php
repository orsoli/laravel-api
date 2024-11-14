<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'title' => 'Front-end',
                'description' => 'Projects focused on the client-side, involving UI/UX and interaction design.'
            ],
            [
                'title' => 'Back-end',
                'description' => 'Projects focused on server-side functionality, database management, and APIs.'
            ],
            [
                'title' => 'Full-stack',
                'description' => 'Projects that include both front-end and back-end development.'
            ],
            [
                'title' => 'Database',
                'description' => 'Projects centered on database architecture, optimization, and data management.'
            ],
            [
                'title' => 'Mobile',
                'description' => 'Projects aimed at developing applications for mobile platforms such as iOS and Android.'
            ],
            [
                'title' => 'Devops',
                'description' => 'Projects that focus on automation, infrastructure management, and CI/CD pipelines.'
            ],
        ];

        foreach($types as $type){
            $type = Type::create($type);
        }
    }
}