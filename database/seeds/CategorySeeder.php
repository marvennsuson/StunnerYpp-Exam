<?php

use Illuminate\Database\Seeder;
use App\Laravel\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => "rock",

            ],
            [
                'title' => "jazz",

            ],
            [
                'title' => "pop music",

            ],
            [
                'title' => "classic",

            ],
            [
                'title' => "hip hop",

            ],
            [
                'title' => "folk",

            ],
            [
                'title' => "country",

            ],
            [
                'title' => "soul",

            ],
            [
                'title' => "reggae",

            ],
            [
                'title' => "r&b",

            ],
 
        ];
        foreach($data as $data){
            Category::create($data);
        }
      
    }
}
