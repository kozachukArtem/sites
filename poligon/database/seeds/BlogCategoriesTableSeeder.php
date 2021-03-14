<?php

use Illuminate\Database\Seeder;

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
            'parent_id' => 0,
            'slug'      => str_slug($cName),
            'title'     => $cName,
        ];

        for ($i = 1; $i <= 10; $i++) {
            $cName = 'Категория №'.$i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'parent_id' => $parentId,
                'slug'      => str_slug($cName),
                'title'     => $cName,
            ];

        }

        DB::table('blog_categories')->insert($categories);
    }
}
