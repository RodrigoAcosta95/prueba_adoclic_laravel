<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create(['category' => 'Animals-Seeder']);
        Category::create(['category' => 'Security-Seeder']);
    }
}
