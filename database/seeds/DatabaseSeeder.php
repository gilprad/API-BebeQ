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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CagesTableSeeder::class);
        $this->call(PenyakitTableSeeder::class);
        $this->call(GejalaTableSeeder::class);
        $this->call(GejalaPenyakitTableSeeder::class);
    }
}
