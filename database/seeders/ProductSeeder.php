<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "product_name" => 'Paket - 1',
            "product_price" => "117500",
            "image" => null,
            "product_link" => null,
            "description" => 'Medali, Piagam Cetak, Sertifikat Cetak, Piagam Digital, Sertifikat Digital dan Pembahasan',
            "competition_id" => 1,
            "study_id" => 1,
            "is_active" => 1,
            "is_fisik" => 1,
            "product_for" => '1,2,3'
        ]);
        
        Product::create([
            "product_name" => 'Paket - 2',
            "product_price" => "65000",
            "image" => null,
            "product_link" => null,
            "description" => 'Piagam Cetak, Sertifikat Cetak, Piagam Digital, Sertifikat Digital dan Pembahasan',
            "competition_id" => 1,
            "study_id" => 1,
            "is_active" => 1,
            "is_fisik" => 1,
            "product_for" => '1,2,3'
        ]);

        Product::create([
            "product_name" => 'Paket - 2 + LEGALISIR',
            "product_price" => "86000",
            "image" => null,
            "product_link" => null,
            "description" => 'Piagam Cetak, Sertifikat Cetak, Piagam Digital, Sertifikat Digital, Pembahasan dan Legalisir Piagam',
            "competition_id" => 1,
            "study_id" => 1,
            "is_active" => 1,
            "is_fisik" => 1,
            "product_for" => '1,2,3'
        ]);
        
        Product::create([
            "product_name" => 'Paket - 3',
            "product_price" => "85000",
            "image" => null,
            "product_link" => null,
            "description" => 'Medali, Sertifikat Digital dan Pembahasan',
            "competition_id" => 1,
            "study_id" => 1,
            "is_active" => 1,
            "is_fisik" => 1,
            "product_for" => '1,2,3'
        ]);

        Product::create([
            "product_name" => 'Paket - KOMPLIT',
            "product_price" => "137500",
            "image" => null,
            "product_link" => null,
            "description" => 'Medali, Piagam Cetak, Sertifikat Cetak, Piagam Digital, Sertifikat Digital, Pembahasan dan Legalisir Piagam',
            "competition_id" => 1,
            "study_id" => 1,
            "is_active" => 1,
            "is_fisik" => 1,
            "product_for" => '1,2,3'
        ]);
        Product::create([
            "product_name" => 'Paket - 4',
            "product_price" => "60000",
            "image" => null,
            "product_link" => null,
            "description" => 'Piagam Digital, Sertifikat Digital, Pembahasan dan Legalisir Piagam',
            "competition_id" => 1,
            "study_id" => 1,
            "is_active" => 1,
            "is_fisik" => 1,
            "product_for" => '1,2,3'
        ]);

        Product::create([
            "product_name" => 'Paket - 5',
            "product_price" => "60000",
            "image" => null,
            "product_link" => null,
            "description" => 'Piagam Digital dan Sertifikat Digital',
            "competition_id" => 1,
            "study_id" => 1,
            "is_active" => 1,
            "is_fisik" => 1,
            "product_for" => '1,2,3'
        ]);

        Product::create([
            "product_name" => 'Paket - 6',
            "product_price" => "150000",
            "image" => null,
            "product_link" => null,
            "description" => 'T-Shirt Exclusive dan Pembahasan',
            "competition_id" => 1,
            "study_id" => 1,
            "is_active" => 1,
            "is_fisik" => 1,
            "product_for" => '1,2,3,0'
        ]);

    }
}
