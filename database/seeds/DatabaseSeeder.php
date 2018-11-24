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
        App\Section::create([
            'id' => 1,
            'id_attr' => 'welcome',
            'nav_title' => 'Start'
        ]);
        App\Section::create([
            'id' => 2,
            'id_attr' => 'about',
            'nav_title' => 'O mně'
        ]);
        App\Section::create([
            'id' => 3,
            'id_attr' => 'services',
            'nav_title' => 'Znalosti'
        ]);
        App\Section::create([
            'id' => 4,
            'id_attr' => 'portfolio',
            'nav_title' => 'Projekty'
        ]);
        App\Section::create([
            'id' => 5,
            'id_attr' => 'reference',
            'nav_title' => 'Reference'
        ]);
        App\Section::create([
            'id' => 6,
            'id_attr' => 'contact',
            'nav_title' => 'Kontakt'
        ]);
    }
}
