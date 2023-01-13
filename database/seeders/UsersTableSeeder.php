<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'aaa',
            'email' => 'aaa@example.com',
            'password' => \Hash::make('aaaaaaaaa'),
        ];
        User::create($param);

        $param = [
            'name' => 'bbb',
            'email' => 'bbb@example.com',
            'password' => \Hash::make('bbbbbbbbb'),
        ];
        User::create($param);
    }
}
