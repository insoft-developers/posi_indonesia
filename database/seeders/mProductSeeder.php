<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class mProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "product_name" => "Paket - 1",
            "product_price" => 117500,
            "product_link" => "",
            "description" => "Medali, Piagam Cetak, Sertifikat Cetak, Piagam Digital, Sertifikat Digital dan Pembahasan",
            "competition_id" => 1,
            "study_id" => 1,
            "is_fisik" => 1,
            "is_active" => 1,
            "product_for" => "1,2,3",
            "is_combo" => "1",
            "composition" => "1,2,3,4,5,6",
        ]);

        Product::create([
            "product_name" => "Paket - 2",
            "product_price" => 65000,
            "product_link" => "",
            "description" => "Piagam Cetak, Sertifikat Cetak, Piagam Digital, Sertifikat Digital dan Pembahasan",
            "competition_id" => 1,
            "study_id" => 1,
            "is_fisik" => 1,
            "is_active" => 1,
            "product_for" => "1,2,3",
            "is_combo" => "1",
            "composition" => "2,3,4,5,6",
        ]);

        Product::create([
            "product_name" => "Paket - 2 + Legalisir",
            "product_price" => 86000,
            "product_link" => "",
            "description" => "Piagam Cetak, Sertifikat Cetak, Piagam Digital, Sertifikat Digital, Pembahasan dan Legalisir Piagam",
            "competition_id" => 1,
            "study_id" => 1,
            "is_fisik" => 1,
            "is_active" => 1,
            "product_for" => "1,2,3",
            "is_combo" => "1",
            "composition" => "2,3,4,5,6,7",
        ]);


        Product::create([
            "product_name" => "Paket - 3",
            "product_price" => 85000,
            "product_link" => "",
            "description" => "Medali, Sertifikat Digital dan Pembahasan",
            "competition_id" => 1,
            "study_id" => 1,
            "is_fisik" => 1,
            "is_active" => 1,
            "product_for" => "1,2,3",
            "is_combo" => "1",
            "composition" => "1,5,6",
        ]);

        Product::create([
            "product_name" => "Paket - Komplit",
            "product_price" => 137500,
            "product_link" => "",
            "description" => "Medali, Piagam Cetak, Sertifikat Cetak, Piagam Digital, Sertifikat Digital, Pembahasan dan Legalisir Piagam",
            "competition_id" => 1,
            "study_id" => 1,
            "is_fisik" => 1,
            "is_active" => 1,
            "product_for" => "1,2,3",
            "is_combo" => "1",
            "composition" => "1,2,3,4,5,6,7",
        ]);


        Product::create([
            "product_name" => "Paket - 4",
            "product_price" => 60000,
            "product_link" => "",
            "description" => "Piagam Digital, Sertifikat Digital, Pembahasan dan Legalisir Piagam",
            "competition_id" => 1,
            "study_id" => 1,
            "is_fisik" => 0,
            "is_active" => 1,
            "product_for" => "1,2,3",
            "is_combo" => "1",
            "composition" => "4,5,6,7",
        ]);


        Product::create([
            "product_name" => "Paket - 5",
            "product_price" => 60000,
            "product_link" => "",
            "description" => "Piagam Digital dan Sertifikat Digital",
            "competition_id" => 1,
            "study_id" => 1,
            "is_fisik" => 0,
            "is_active" => 1,
            "product_for" => "1,2,3",
            "is_combo" => "1",
            "composition" => "4,5",
        ]);


        Product::create([
            "product_name" => "Paket - 6",
            "product_price" => 150000,
            "product_link" => "",
            "description" => "T-Shirt Exclusive dan Pembahasan",
            "competition_id" => 1,
            "study_id" => 1,
            "is_fisik" => 0,
            "is_active" => 1,
            "product_for" => "1,2,3,0",
            "is_combo" => "1",
            "composition" => "8,6",
        ]);



        

        

        

    }
}
