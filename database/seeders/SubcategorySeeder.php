<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            // Celulares y tablets
            [
                'category_id' => 1,
                'name' => 'Celulares y smartphones',
                'slug' => Str::slug('Celulares y smartphones'),
                'color' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares'),
                'color' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),
                'color' => true
            ],
            //Tv,audio y video

            [
                'category_id' => 2,
                'name' => 'Tv y audio',
                'slug' => Str::slug('Tv y audio'),
                'color' => true
            ],
            [
                'category_id' => 2,
                'name' => 'Audio',
                'slug' => Str::slug('Audio'),
                'color' => true
            ],
            [
                'category_id' => 2,
                'name' => 'Audio para autos',
                'slug' => Str::slug('Audio para autos'),
                'color' => true
            ],

            // Consolea y videojuegos
            [
                'category_id' => 3,
                'name' => 'xbox',
                'slug' => Str::slug('xbox'),
                'color' => true
            ],
            [
                'category_id' => 3,
                'name' => 'Play Station',
                'slug' => Str::slug('Play Station'),
                'color' => true
            ],
            [
                'category_id' => 3,
                'name' => 'Videojuegos para PC',
                'slug' => Str::slug('Videojuegos para PC'),
                'color' => true
            ],
            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
                'color' => true
            ],

            // Computacion

            [
                'category_id' => 4,
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),
                'color' => true
            ],
            [
                'category_id' => 4,
                'name' => 'PC escritorio',
                'slug' => Str::slug('PC escritorio'),
                'color' => true
            ],
            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
                'color' => true
            ],
            [
                'category_id' => 4,
                'name' => 'Accesorios computadoras',
                'slug' => Str::slug('Accesorios computadoras'),
                'color' => true
            ],
            // Moda

            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' => true
            ],
            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color' => true
            ],
            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
                'color' => true
            ],
            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes'),
                'color' => true
            ],

        ];

        foreach($subcategories as $subcategory){

            Subcategory::factory(1)->create($subcategory);

        }
    }
}
