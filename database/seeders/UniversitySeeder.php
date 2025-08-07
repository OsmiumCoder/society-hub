<?php

namespace Database\Seeders;

use App\Models\Society;
use App\Models\University;
use App\Models\User;
use App\SocietyMemberRole;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        University::factory()
            ->count(3)
            ->has(Society::factory()
                ->hasAttached(User::factory()->count(50), [
                    'role' => SocietyMemberRole::Member,
                    'title' => fake()->jobTitle,
                ], 'members')
                ->count(3))
            ->create();
    }
}
