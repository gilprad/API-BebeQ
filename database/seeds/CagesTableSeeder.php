<?php

use \App\Cage;
use Illuminate\Database\Seeder;

class CagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cage::create([
        	'id' => 1,
        	'user_id' => 2,
        	'category_id' => 1,
        	'name' => 'Kandang Pertama',
        	'current_capacity' => 20,
        	'capacity' => 200,
        	'active' => true,
        ]);
        Cage::create([
            'id' => 2,
            'user_id' => 2,
            'category_id' => 2,
            'name' => 'Kandang Kedua',
            'current_capacity' => 20,
            'capacity' => 200,
            'active' => true,
        ]);
    }
}
