<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::insert([
            [
                'name' => 'Surat Resmi',
                'slug' => Str::slug('Surat Resmi'),
            ],
            [
                'name' => 'Surat Tidak Resmi',
                'slug' => Str::slug('Surat Tidak Resmi'),
            ],
            [
                'name' => 'Surat Sangat Rahasia',
                'slug' => Str::slug('Surat Sangat Rahasia'),
            ],
            [
                'name' => 'Surat Rahasia',
                'slug' => Str::slug('Surat Rahasia'),
            ],
            [
                'name' => 'Surat Terbatas',
                'slug' => Str::slug('Surat Terbatas'),
            ],
            [
                'name' => 'Surat Biasa',
                'slug' => Str::slug('Surat Biasa'),
            ],
            [
                'name' => 'Surat Segera',
                'slug' => Str::slug('Surat Segera'),
            ],
        ]);
    }
}
