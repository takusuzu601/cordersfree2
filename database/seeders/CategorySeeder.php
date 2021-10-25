<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            [
                'name'=>'Celulares y tablets',
                'slug'=>Str::slug('Celulares y tablets'),
                'icon'=>'<i class="fas fa-mobile-alt"></i>'
            ],
            [
                'name'=>'Tv,audio y video',
                'slug'=>Str::slug('Tv,audio y video'),
                'icon'=>'<i class="fas fa-tv"></i>'
            ],
            [
                'name'=>'Consolea y videojuegos',
                'slug'=>Str::slug('Consolea y videojuegos'),
                'icon'=>'<i class="fas fa-gamepad"></i>'
            ],
            [
                'name'=>'Computacion',
                'slug'=>Str::slug('Computacion'),
                'icon'=>'<i class="fas fa-laptop"></i>'
            ],
            [
                'name'=>'Moda',
                'slug'=>Str::slug('Moda'),
                'icon'=>'<i class="fas fa-tshirt"></i>'
            ],
        ];

        foreach($categories as $category){
            Category::factory(1)->create($category);
        }
    }
}
