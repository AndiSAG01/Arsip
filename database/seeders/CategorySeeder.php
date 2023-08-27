<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Surat Undangan',
                'slug' => Str::slug('Surat Undangan'),
            ],
            [
                'name' => 'Surat Edaran',
                'slug' => Str::slug('Surat Edaran'),
            ],
            [
                'name' => 'Surat Perintah',
                'slug' => Str::slug('Surat Perintah'),
            ],
            [
                'name' => 'Surat Intruksi',
                'slug' => Str::slug('Surat Intruksi'),
            ],
            [
                'name' => 'Surat Tugas',
                'slug' => Str::slug('Surat Tugas'),
            ],
            [
                'name' => 'Surat Permohonan',
                'slug' => Str::slug('Surat Permohonan'),
            ],
            [
                'name' => 'Surat Perjalanan Dinas',
                'slug' => Str::slug('Surat Perjalanan Dinas'),
            ],
            [
                'name' => 'Surat Keputusan',
                'slug' => Str::slug('Surat Keputusan'),
            ],
            [
                'name' => 'Surat Pengantar',
                'slug' => Str::slug('Surat Pengantar'),
            ],
            [
                'name' => 'Surat Keterangan',
                'slug' => Str::slug('Surat Keterangan'),
            ],
            [
                'name' => 'Surat Pemberitahuan',
                'slug' => Str::slug('Surat Pemberitahuan'),
            ],
            [
                'name' => 'Surat Pernyataan',
                'slug' => Str::slug('Surat Pernyataan'),
            ],
            [
                'name' => 'Surat Pengesahan',
                'slug' => Str::slug('Surat Pengesahan'),
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
            ]);
        }
    }
}
