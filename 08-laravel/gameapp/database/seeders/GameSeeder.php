<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $game = new Game;
        $game->title        = 'Mario Oddyssey';
        $game->developer    = 'Nintendo';
        $game->releasedate  = '2017-10-17';
        $game->category_id  = 1;
        $game->user_id      = 1;
        $game->price        = 59;
        $game->genre        = '3D Adventure';
        $game->description  = 'Lorem ipsum dolor sit amet';
        $game->save();
    }
}
