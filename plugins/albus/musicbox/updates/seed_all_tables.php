<?php namespace RainLab\Blog\Updates;

use Carbon\Carbon;
use Albus\MusicBox\Models\Artist;
use Albus\MusicBox\Models\Mss;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{

    public function run()
    {
        Artist::create([
            'name' => 'Don Diablo',
        ]);
        Artist::create([
            'name' => 'Tchami',
        ]);
        Artist::create([
            'name' => 'Oliver heldens',
        ]);

        Mss::create([
            'name' => 'Apple Music',
        ]);
        Mss::create([
            'name' => 'Yandex Music',
        ]);
        Mss::create([
            'name' => 'Spotify',
        ]);
    }

}
