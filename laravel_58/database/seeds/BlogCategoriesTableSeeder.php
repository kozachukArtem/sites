<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'Без категории';
        $categories[] = [
            'parent_id' => 1,
            'slug'      => Str::slug($cName),
            'title'     => $cName,
        ];

        for ($i = 2; $i <= 11; $i++) {
            $cName = 'Категория №'.$i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'parent_id' => $parentId,
                'slug'      => Str::slug($cName),
                'title'     => $cName,
            ];

        }

        DB::table('blog_categories')->insert($categories);
    }
}
