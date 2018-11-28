<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Section::create([
            'id' => 1,
            'attr_id' => 'welcome',
            'nav_title' => 'www.petrkozler.cz',
            'heading' => 'PETR KOZLER',
            'paragraph' => 'Vítejte na mých webových stránkách!',
            'next_label' => 'Zobrazit profil',
            'bg_image_path' => 'header.jpg',
        ]);
        App\Section::create([
            'id' => 2,
            'attr_id' => 'about',
            'nav_title' => 'Profil',
            'heading' => 'O mně',
            'paragraph' => 'Jmenuji se Petr Kozler, jsem 25 letý programátor a IT nadšenec. Studoval jsem obor Informatika na Fakultě aplikovaných věd Západočeské univezity v Plzni. Mám zkušenosti s moderními OO jazyky (C#.NET a Java) a vývojem webů s použitím běžných jazyků a technologií (PHP, MySQL, JS, CSS a HTML), v menší míře i s psaním nízkoúrovňových aplikací (zejm. v C/C++) a se správou OS Windows i Linux. Momentálně hledám uplatnění především jako junior programátor nebo tester SW.',
            'next_label' => 'Více informací',
        ]);
        App\Section::create([
            'id' => 3,
            'attr_id' => 'services',
            'nav_title' => 'Dovednosti',
            'heading' => 'Odborné dovednosti',
        ]);
        App\Section::create([
            'id' => 4,
            'attr_id' => 'portfolio',
            'nav_title' => 'Projekty',
            'heading' => 'Ukázky projektů',
        ]);
        App\Section::create([
            'id' => 5,
            'attr_id' => 'reference',
            'nav_title' => 'Odkaz',
            'heading' => 'Tyto a některé moje další projekty jsou volně dostupné na GitHub profilu:',
        ]);
        App\Section::create([
            'id' => 6,
            'attr_id' => 'contact',
            'nav_title' => 'Kontakt',
            'heading' => 'Kontaktní informace',
            'paragraph' => 'V případě zájmu mě prosím nejprve kontaktujte na níže uvedené e-mailové adrese:',
        ]);
    }
}
