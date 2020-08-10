<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class, 2)
            ->create()
            ->each(function ($category) {
               $category->meals()->saveMany(factory(\App\Meal::class, 5)->make());
            });

        // TODO: seed ingredients and tags and connect them to Meal
    }
}
