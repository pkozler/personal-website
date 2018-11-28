<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Link::create([
            'text_val' => 'github.com/pkozler',
            'attr_ref' => 'https://github.com/pkozler',
            'attr_icon' => 'fa fa-github',
            'attr_id' => 'github-profile',
        ]);
        App\Link::create([
            'text_val' => '+420 605 589 359',
            'attr_ref' => 'tel:+420605589359',
            'attr_icon' => 'fa fa-phone',
            'attr_id' => 'phone-number',
        ]);
        App\Link::create([
            'text_val' => 'pkozler.email(at)gmail.com',
            'attr_ref' => 'mailto:pkozler.email@gmail.com',
            'attr_icon' => 'fa fa-envelope',
            'attr_id' => 'email-address',
        ]);
        App\Link::create([
            'text_val' => 'facebook.com/kozler.petr',
            'attr_ref' => 'https://facebook.com/kozler.petr',
            'attr_icon' => 'fa fa-facebook',
            'attr_id' => 'facebook-link',
        ]);
    }
}
