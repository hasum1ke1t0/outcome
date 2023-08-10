<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => '八巻柾樹',
                'school' => '千葉大学',
                'email' => 'hachi.horiuchi@gmail.com',
                'password' => 'Zm46repw'
         ]);
    }
}
