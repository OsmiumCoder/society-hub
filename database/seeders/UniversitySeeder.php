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
            ->count(20)
            ->has(Society::factory()
                ->hasAttached(User::factory()->count(5), [
                    'role' => SocietyMemberRole::MEMBER,
                    'title' => null
                ], 'members')
                ->count(10))
            ->create();
    }
}
