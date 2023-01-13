<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category' => 'ミステリー'
        ];
        Category::create($param);

        $param = [
            'category' => 'ファンタジー'
        ];
        Category::create($param);

        $param = [
            'category' => 'SF'
        ];
        Category::create($param);

        $param = [
            'category' => 'ノンフィクション'
        ];
        Category::create($param);

        $param = [
            'category' => 'その他'
        ];
        Category::create($param);
    }
}
