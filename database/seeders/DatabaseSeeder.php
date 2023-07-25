<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Document;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
        ]);
        Category::insert([
            [
                'name' => 'Surat Masuk',
                'slug' => Str::slug('Surat Masuk'),
            ],
            [
                'name' => 'Surat Keluar',
                'slug' => Str::slug('Surat Keluar'),
            ],
        ]);

        User::insert([
           [
            'name' => 'kepala',
            'slug' => str::slug('kepala'),
            'email' => 'kepala@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'nik' => 1234567890,
            'nip' => 1234567890,
            'address' => 'Jambi'.str::random(20),
            'telp' => 1234567890,
            'birthday' => now()->subYear(),
            'isAdmin' => 1
        ],
        [
            'name' => 'petugas',
            'slug' => str::slug('petugas'),
            'email' => 'petugas@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'nik' => 1234567891,
            'nip' => 1234567891,
            'address' => 'Jambi'.str::random(20),
            'telp' => 1234567891,
            'birthday' => now()->subYear(),
            'isAdmin' => 0
        ]
        ]);
        User::factory(20)->create();
        // Category::factory(5)->create();
        // Document::factory(5)->create();
    }
}
