<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todolist;

class TodolistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'やること'
        ];
        Todolist::create($param);
        $param = [
            'name' => 'テスト１'
        ];
        Todolist::create($param);
    }
}
