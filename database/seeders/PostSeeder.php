<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            'Belajar Laravel untuk Pemula',
            'Membuat Aplikasi Blog dengan Laravel',
            'Tutorial Bootstrap 5',
            'Panduan Lengkap Vue.js',
            'Belajar React untuk Pemula',
        ];

        foreach ($judul as $j) {
            $slug = Str::slug($j);
            $slugOri = $slug;
            $i = 1;
            while (Post::where('slug', $slug)->exists()) {
                $slug = $slugOri . '-' . $i++;
            }
            Post::create([
                'title' => $j,
                'slug' => $slug,
                'decription' => "Deskripsi untuk $j",
                'content' => "Content untuk $j",
                'status' => 'publish',
                'user_id' => 1,
            ]);
        }
    }
}
