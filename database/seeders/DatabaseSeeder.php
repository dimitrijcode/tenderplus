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

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        foreach (User::inRandomOrder()->take(5)->get() as $user) {
            $user->keywords()->attach(Keyword::inRandomOrder()->take(rand(0, 3))->pluck('id'));
        }

        // Fixed fixtures: test@example.com shares a keyword with one tender that
        // should be recommended, and with a private and a closed one that should not.
        $fixtureKeyword = Keyword::factory()->create(['name' => 'recommended-demo']);

        User::firstWhere('email', 'test@example.com')->keywords()->syncWithoutDetaching([$fixtureKeyword->id]);

        Tender::factory()->create(['title' => 'Demo: public open tender'])->keywords()->attach($fixtureKeyword);
        Tender::factory()->private()->create(['title' => 'Demo: private tender'])->keywords()->attach($fixtureKeyword);
        Tender::factory()->closed()->create(['title' => 'Demo: closed tender'])->keywords()->attach($fixtureKeyword);
    }
}
