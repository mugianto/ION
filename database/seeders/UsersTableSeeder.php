<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'ughi',
                'slug_penulis' => 'ughi',
                'email' => 'mugianto1nd@gmail.com',
                'password' => bcrypt('123qweasd')
            ],
            [
                'name' => 'editor',
                'slug_penulis' => 'editor',
                'email' => 'editor@example.com',
                'password' => bcrypt('123qweasd')
            ],
            [
                'name' => 'penulis',
                'slug_penulis' => 'penulis',
                'email' => 'penulis@example.com',
                'password' => bcrypt('123qweasd')
            ],
        ]);
    }
}
