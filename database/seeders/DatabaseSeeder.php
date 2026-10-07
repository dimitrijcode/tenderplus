<?php

namespace Database\Seeders;

use App\Models\Keyword;
use App\Models\Tender;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tenders = Tender::factory(10)->create();

        Keyword::factory(5)->create();

        foreach ($tenders as $tender) {
            $tender->keywords()->attach(Keyword::inRandomOrder()->take(rand(0, 3))->pluck('id'));
        }

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
