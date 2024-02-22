<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

$tags = \App\Models\Tag::factory(8)->create();

        \App\Models\User::factory(10)->create()->each(function ($user) use ($tags) {
            \App\Models\Event::factory(rand(1, 5))->create([
                'user_id' => $user->id
            ])->each(function ($event) use ($tags) {
                $event->tags()->attach($tags->random(3));
            });
        });

    }
}
