<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
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
            'category_id' => 1,
            'title' => '探偵ガリレオ',
            'author' => '東野圭吾',
            'publisher' => '文藝春秋',
            'published_year' => '2002',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-02-01',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 3,
            'title' => 'Gene Mapper',
            'author' => '藤井太洋',
            'publisher' => '早川書房',
            'published_year' => '2013',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-02-07',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 5,
            'title' => '東京の子',
            'author' => '藤井太洋',
            'publisher' => '角川',
            'published_year' => '2019',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-02-08',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 5,
            'title' => '13歳からの地政学-カイゾクとの地球儀航海',
            'author' => '田中孝幸',
            'publisher' => '東洋経済新報社',
            'published_year' => '2022',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-02-12',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 5,
            'title' => 'おカネの教室',
            'author' => '高井浩章',
            'publisher' => 'インプレス',
            'published_year' => '2018',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-02-13',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 1,
            'title' => '折れた竜骨',
            'author' => '米澤穂信',
            'publisher' => '東京創元社',
            'published_year' => '2013',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-03-05',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 5,
            'title' => 'よくわかるPHPの教科書',
            'author' => 'たにぐちまこと',
            'publisher' => 'マイナビ出版',
            'published_year' => '2018',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-03-06',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 5,
            'title' => '火花',
            'author' => '又吉直樹',
            'publisher' => '文藝春秋',
            'published_year' => '2017',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-03-12',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 5,
            'title' => '図解まるわかり　サーバーのしくみ',
            'author' => '西村泰洋',
            'publisher' => '翔泳社',
            'published_year' => '2019',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-03-17',
        ];
        Book::create($param);

        $param = [
            'user_id' => 1,
            'category_id' => 5,
            'title' => 'SYNC　なぜ自然はシンクロしたがるのか',
            'author' => 'スティーブン・ストロガッツ',
            'publisher' => '早川書房',
            'published_year' => '2014',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-03-19',
        ];
        Book::create($param);

        $param = [
            'user_id' => 2,
            'category_id' => 5,
            'title' => '猫がよろこぶインテリア',
            'author' => 'ヤノミサエ',
            'publisher' => '辰巳出版',
            'published_year' => '2017',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-03-19',
        ];
        Book::create($param);

        $param = [
            'user_id' => 2,
            'category_id' => 5,
            'title' => 'ねこほん　猫のほんねがわかる本',
            'author' => '今泉忠明、卵山玉子',
            'publisher' => '西東社',
            'published_year' => '2019',
            'comment' => 'テキストが入ります。',
            'read_date' => '2023-03-23',
        ];
        Book::create($param);
    }
}
