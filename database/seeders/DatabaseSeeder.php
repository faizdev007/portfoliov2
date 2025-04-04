<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $skills = ['PHP', 'MySQL', 'JavaScript', 'Python', 'Laravel','PHD','MCA','Java','Excel','IOT'];

        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    }
}
