<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sub_cat_id,cat_id, sub_cat_name, sub_cat_description, sub_cat_image
        $data = [
            ['cat_id' => 1, 'sub_cat_name' => 'Refrigerator','sub_cat_description' => 'Refrigerator','sub_cat_image' => 'subcategory.png'],
            ['cat_id' => 2, 'sub_cat_name' => 'Lifestyle apps','sub_cat_description' => 'Lifestyle apps','sub_cat_image' => 'subcategory.png'],
            ['cat_id' => 3, 'sub_cat_name' => 'Toddler Toys','sub_cat_description' => 'Toddler Toys','sub_cat_image' => 'subcategory.png'],
            ['cat_id' => 4, 'sub_cat_name' => 'Digital Computer','sub_cat_description' => 'Digital Computer','sub_cat_image' => 'subcategory.png'],
            ['cat_id' => 5, 'sub_cat_name' => 'Mobile Devices','sub_cat_description' => 'Mobile Devices','sub_cat_image' => 'subcategory.png'],
            ['cat_id' => 6, 'sub_cat_name' => 'Cleaning Tools','sub_cat_description' => 'Cleaning Tools','sub_cat_image' => 'subcategory.png']
        ];
        DB::table('sub_category')->insert($data);
    }
}
