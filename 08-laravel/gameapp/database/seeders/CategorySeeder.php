<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'        => 'Nintendo Switch',
            'manufacturer' => 'Nintendo',
            'releasedate' => '2017-03-03',
            'description' => 'Lorem ipsum dolor'

        ]);

        $cat = new Category;
        $cat->name          = 'Xbox Series S';
        $cat->manufacturer  = 'Microsof';
        $cat->releasedate   = '2020-11-10';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();

        $cat = new Category;
        $cat->name          = 'Play Station 5';
        $cat->manufacturer  = 'Sony';
        $cat->releasedate   = '2020-11-12';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();

        $cat = new Category;
        $cat->name          = 'Play Station 4';
        $cat->manufacturer  = 'Sony1';
        $cat->releasedate   = '2021-11-12';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();

        $cat = new Category;
        $cat->name          = 'Smarth Phone';
        $cat->manufacturer  = 'Mobile';
        $cat->releasedate   = '2021-11-12';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();

        $cat = new Category;
        $cat->name          = 'PC';
        $cat->manufacturer  = 'Microsoft';
        $cat->releasedate   = '2020-11-10';
        $cat->description   = 'Lorem ipsum dolor sit amet';
        $cat->save();
    }
}
