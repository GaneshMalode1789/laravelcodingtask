<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['cat_id' => 1, 'cat_name' => 'Appliances','cat_description' => 'Appliances','cat_image' => 'category.png'],
            ['cat_id' => 2, 'cat_name' => 'Apps & Games','cat_description' => 'Apps & Games','cat_image' => 'category.png'],
            ['cat_id' => 3, 'cat_name' => 'Baby','cat_description' => 'Baby','cat_image' => 'category.png'],
            ['cat_id' => 4, 'cat_name' => 'Computers','cat_description' => 'Computers','cat_image' => 'category.png'],
            ['cat_id' => 5, 'cat_name' => 'Electronics','cat_description' => 'Electronics','cat_image' => 'category.png'],
            ['cat_id' => 6, 'cat_name' => 'Home & Kitchen','cat_description' => 'Home & Kitchen','cat_image' => 'category.png']
        ];
        DB::table('category')->insert($data);
    }
}
