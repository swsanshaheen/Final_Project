<?php

namespace Database\Seeders;

use App\Models\comment;
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
        // \App\Models\User::factory(10)->create();
        $this->call(userSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(postSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
