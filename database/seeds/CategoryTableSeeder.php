<?php

use \App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' => 'Meri',
            'berat' => 60,
        ]);
        Category::create([
        	'name' => 'Dara',
            'berat' => 110,
        ]);
        Category::create([
        	'name' => 'Babon',
            'berat' => 150,
        ]);

    }
}
