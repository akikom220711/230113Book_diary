<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnreadBook;

class UnreadBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'title' => '食堂かたつむり',
            'author' => '小川糸'
        ];
        UnreadBook::create($param);

        $param = [
            'user_id' => 1,
            'title' => 'グラスホッパー',
            'author' => '伊坂幸太郎'
        ];
        UnreadBook::create($param);

        $param = [
            'user_id' => 1,
            'title' => 'いちばんやさしいGit＆GitHubの教本',
            'author' => '横田紋奈、宇賀神みずき'
        ];
        UnreadBook::create($param);

        $param = [
            'user_id' => 2,
            'title' => 'プロになるためのWeb技術入門',
            'author' => '小森裕介'
        ];
        UnreadBook::create($param);

        $param = [
            'user_id' => 2,
            'title' => '正義のミカタ',
            'author' => '本多孝好'
        ];
        UnreadBook::create($param);
    }
}
