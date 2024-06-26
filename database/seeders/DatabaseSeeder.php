<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pelanggan::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Febrian Rey',
        //     'username' => 'febrian',
        //     'password' => Hash::make('password'),
        //     'alamat' => 'Jl. Kali Acai',
        //     'tgl_lahir' => '2024-06-15',
        //     'jk' => 'L',
        //     'kontak' => '081344746157',
        //     'level_name' => 'Administrator',
        //     'level' => '1'
        // ]);
    }
}
