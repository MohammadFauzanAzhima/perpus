<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Banu',
            'username' => 'banu',
            'email' => 'banu@gmail.com',
            'nis' => '123456',
            'password' => Hash::make('123')
        ]);

        DB::table('users')->insert([
            'name' => 'Fauzan',
            'username' => 'fauzan',
            'email' => 'fauzan@gmail.com',
            'nis' => '654321',
            'password' => Hash::make('123')
        ]);

        DB::table('categories')->insert([
            'name' => 'fiksi',
        ]);

        DB::table('categories')->insert([
            'name' => 'non fiksi',
        ]);

        DB::table('books')->insert([
            'judul' => 'Judul Buku',
            'penulis' => 'Risa',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'ini deksripsi buku',
            'stok' => 5,
            'category_id' => 1,
        ]);

        DB::table('books')->insert([
            'judul' => 'Judul Buku',
            'penulis' => 'Risa',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'ini deksripsi buku',
            'stok' => 5,
            'category_id' => 2,
        ]);
        
        DB::table('books')->insert([
            'judul' => 'Judul Buku',
            'penulis' => 'Risa',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'ini deksripsi buku',
            'stok' => 5,
            'category_id' => 1,
        ]);

        DB::table('books')->insert([
            'judul' => 'Judul Buku',
            'penulis' => 'Risa',
            'penerbit' => 'Gramedia',
            'deskripsi' => 'ini deksripsi buku',
            'stok' => 5,
            'category_id' => 2,
        ]);
    }
}
