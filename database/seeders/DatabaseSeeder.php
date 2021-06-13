<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use database\seeders\UsersAndNotesSeeder;
use database\seeders\MenusTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersAndNotesSeeder::class,
            MenusTableSeeder::class,
            FolderTableSeeder::class,
            ExampleSeeder::class,
            BREADSeeder::class,
            MenusTableSeeder::class,
            wilayah::class
        ]);
    }
}
