<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->truncate();
        DB::table('kategoris')->insert(
        [
            [
                'nama_kategori' => 'Web Design',
                'slug_kategori' => 'web-design'
            ],
            [
                'nama_kategori' => 'It It',
                'slug_kategori' => 'it-it'
            ],
            [
                'nama_kategori' => 'Photography',
                'slug_kategori' => 'poto'
            ],
            [
                'nama_kategori' => 'Majalah',
                'slug_kategori' => 'majalah'
            ],
            [
                'nama_kategori' => 'Koran',
                'slug_kategori' => 'koran'
            ],
        ]);

        for ($id_artikel = 1; $id_artikel <= 10; $id_artikel++)
        {
            $id_kategori = rand(1, 5);
            DB::table('artikels')
            ->where('id', $id_artikel)
            ->update(['id_kategori' => $id_kategori]);
        }

    }
}
