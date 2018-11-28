<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'Java 8 | C# | C | C++ | Free Pascal | JavaFX',
            'label_name' => 'Aplikace pro správu kódu vytvořených knihoven (bakalářská práce)',
        ]);
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'C#.NET | WPF | Entity Framework | MS-SQL',
            'label_name' => 'Evidence vědeckých publikací pro .NET Framework',
        ]);
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'PHP 5 | Twig | HTML5&CSS3 | Bootstrap 3 | jQuery UI | MySQL',
            'label_name' => 'Diskusní web (vlastní návrh MVC architektury)',
        ]);
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'HTML5&CSS3 | JavaScript | jQuery',
            'label_name' => 'Automatický převod kódu ve webovém UI (bakalářská práce)',
        ]);
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'GNU C | Pthreads | BSD Sockets',
            'label_name' => 'Piškvorky po síti (TCP server pro Linux)',
        ]);
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'Java 7 | Swing | Java Networking',
            'label_name' => 'Piškvorky po síti (multiplatformní TCP klient)',
        ]);
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'Java 8 | Java ImageIO | JavaFX',
            'label_name' => 'Detekce hran v rastrovém obrázku',
        ]);
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'Java 7 | Android SDK',
            'label_name' => 'Kalkulačka pro Android s grafickým zobrazením funkcí',
        ]);
        App\Image::create([
            'path' => '1.png',
            'label_category' => 'Java 8 | JavaFX | Log4j | HttpComponents | Jackson | Spring-WS',
            'label_name' => 'Monitoring běhu komponent voláním WS se SOAP/REST API (týmový projekt)',
        ]);
    }
}
