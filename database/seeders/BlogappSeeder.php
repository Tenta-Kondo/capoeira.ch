<?php

namespace Database\Seeders;

use App\Models\Blogapp;
use Illuminate\Database\Seeder;

class BlogappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Blogapp::factory()->count(6)->create();
    }
}
