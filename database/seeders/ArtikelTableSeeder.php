<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class ArtikelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artikels')->truncate();

        $artikels = [];
        $faker = Factory::create();
        $varDate = Carbon::create(2023, 9, 17, 9);
        $tahunMaksimum = 2023; // Tahun maksimum

        for ($i = 1; $i <= 40; $i++) {

            // Unduh gambar dari Lorem Picsum
            $response = Http::get('https://picsum.photos/850/350');
            $varGambar = null;
            $varDate->addDays($i);
            
            // Periksa jika tahun melebihi batas maksimum
            if ($varDate->year > $tahunMaksimum) {
                $varDate->year = $tahunMaksimum; // Set tahun ke tahun maksimum
            }

            $tglTerbit = clone($varDate);
            $tglBuat = clone($varDate);

            if ($response->successful()) {
                $imageContents = $response->body();
                $varGambar = 'gambar-' . $i . '.jpg'; 
                $gambarPath = storage_path('/app/public/asetnya/upl/gambar/artikel/otentik/' . $varGambar);
                $thumbPath = storage_path('/app/public/asetnya/upl/gambar/artikel/thumb/' . $varGambar);

                // Simpan gambar otentik
                file_put_contents($gambarPath, $imageContents);

                // Buat dan simpan gambar thumb
                $thumbImage = Image::make($gambarPath)->fit(335, 173);
                $thumbImage->save($thumbPath);
            }

            $artikels[] = [
                'id_penulis' => rand(1, 3),
                'id_kategori' => rand(1, 5),
                'judul' => $faker->sentence(rand(5, 6)),
                'kutipan' => $faker->text(rand(250, 300)),
                'isi_artikel' => $faker->paragraphs(rand(10, 15), true),
                'slug' => $faker->unique()->slug(rand(3, 6)),
                'gambar' => $varGambar,
                'created_at' => $tglBuat,
                'updated_at' => $tglBuat,
                'terbit_tgl' => $i < 5? $tglTerbit->copy()->addYears(rand(1, 5)) : (rand(0, 1) == 0 ? null : $tglTerbit->copy()->addDays(4)),
                'artikel_viewer' => rand(1, 10) * 10
            ];
        }

        DB::table('artikels')->insert($artikels);
    }
}
