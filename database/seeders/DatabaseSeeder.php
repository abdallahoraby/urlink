<?php

use Database\Seeders\SettigDetailsOldSeeder;
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
        $this->call(SettigDetailsOldSeeder::class);
    }
}
