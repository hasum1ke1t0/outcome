<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
                'name' => 'オートマトン',
                'create_year' => 2020,
                'course' => '計算科学',
                'body' => '落丁等は特にありません',
                'image' => ' ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
