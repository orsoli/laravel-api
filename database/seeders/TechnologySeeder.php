<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'HTML',
                'type' => 'Markup Language',
                'description' => 'The standard language for creating web pages and web applications.',
            ],
            [
                'name' => 'CSS',
                'type' => 'Style Sheet Language',
                'description' => 'A language used to describe the presentation of a document written in HTML or XML.',
            ],
            [
                'name' => 'JavaScript',
                'type' => 'Programming Language',
                'description' => 'A versatile programming language commonly used in web development for interactivity and functionality.',
            ],
            [
                'name' => 'Vue.js',
                'type' => 'JavaScript Framework',
                'description' => 'A progressive JavaScript framework for building user interfaces, especially single-page applications.',
            ],
            [
                'name' => 'PHP',
                'type' => 'Programming Language',
                'description' => 'A server-side scripting language designed for web development.',
            ],
            [
                'name' => 'Laravel',
                'type' => 'PHP Framework',
                'description' => 'A powerful MVC PHP framework for building web applications with an elegant syntax.',
            ],
            [
                'name' => 'SQL',
                'type' => 'Query Language',
                'description' => 'A language used to manage and manipulate relational databases.',
            ],
            [
                'name' => 'Python',
                'type' => 'Programming Language',
                'description' => 'A high-level, interpreted programming language known for readability and versatility.',
            ],
            [
                'name' => 'React',
                'type' => 'JavaScript Library',
                'description' => 'A JavaScript library for building user interfaces, mainly for single-page applications.',
            ],
        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }

    }
}