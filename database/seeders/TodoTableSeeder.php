<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ←これを追加
use DateTime;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = ['家に帰る','ご飯を食べる','寝る'];
        foreach ($content as $contents) {
            DB::table('todos')->insert ([
                'content' =>$contents,
                'created_at' => new Datetime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
