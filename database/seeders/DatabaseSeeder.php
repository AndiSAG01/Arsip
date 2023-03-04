<?php

namespace Database\Seeders;

use App\Models\Category;
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
        User::insert([
            'name' => 'Administrator',
            'slug' => str::slug('administrator'),
            'email' => 'testing@testing.com',
            'email_verified_at' => now(),
            'password' => Hash::make('testing'), // password
            'remember_token' => Str::random(10),
            'nik' => 1234567890,
            'nip' => 1234567890,
            'address' => 'Jambi'.str::random(20),
            'telp' => 1234567890,
            'birthday' => now()->subYear(),
            'isAdmin' => 1,
        ]);
        User::factory(20)->create();
        Category::factory(5)->create();
    }
}
