<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Note::create([
            'title' => 'C# .NET',
            'description' => 'WPF, ASP.NET MVC, Entity Framework',
            'figure' => 'devicons devicons-code_badge',
        ]);
        App\Note::create([
            'title' => 'Java SE',
            'description' => 'JavaFX, Android API',
            'figure' => 'devicons devicons-code_badge',
        ]);
        App\Note::create([
            'title' => 'PHP & MySQL',
            'description' => 'Slim, Twig, Eloquent',
            'figure' => 'devicons devicons-code_badge',
        ]);
        App\Note::create([
            'title' => 'HTML5 & CSS3',
            'description' => 'Twitter Bootstrap, PureCSS',
            'figure' => 'devicons devicons-code_badge',
        ]);
        App\Note::create([
            'title' => 'JavaScript',
            'description' => 'jQuery, NodeJS',
            'figure' => 'devicons devicons-code_badge',
        ]);
        App\Note::create([
            'title' => 'C/C++',
            'description' => 'POSIX threads, BSD sockets',
            'figure' => 'devicons devicons-code_badge',
        ]);
        App\Note::create([
            'title' => 'Ostatní jazyky',
            'description' => 'Python, Free Pascal',
            'figure' => 'devicons devicons-code_badge',
        ]);
        App\Note::create([
            'title' => 'Operační systémy',
            'description' => 'Bash shell, Cmd',
            'figure' => 'devicons devicons-code_badge',
        ]);
    }
}
