<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics',  'icon' => '💻'],
            ['name' => 'ID & Cards',   'icon' => '🪪'],
            ['name' => 'Keys',         'icon' => '🔑'],
            ['name' => 'Bags',         'icon' => '🎒'],
            ['name' => 'Clothing',     'icon' => '👕'],
            ['name' => 'Books',        'icon' => '📚'],
            ['name' => 'Accessories',  'icon' => '⌚'],
            ['name' => 'Other',        'icon' => '📦'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}