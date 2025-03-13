<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsCategory::create([
            "category" => "Default",
            "slug" => "default"
        ]);

        NewsCategory::create([
            "category" => "Pendidikan",
            "slug" => "pendidikan"
        ]);

        NewsCategory::create([
            "category" => "Ekonomi",
            "slug" => "ekonomi"
        ]);

        NewsCategory::create([
            "category" => "Hukum",
            "slug" => "hukum"
        ]);

        NewsCategory::create([
            "category" => "Kesehatan",
            "slug" => "kesehatan"
        ]);
        NewsCategory::create([
            "category" => "Hiburan",
            "slug" => "hiburan"
        ]);

        NewsCategory::create([
            "category" => "Sains",
            "slug" => "sains"
        ]);

        NewsCategory::create([
            "category" => "Lainnya",
            "slug" => "lainnya"
        ]);
    }
}
