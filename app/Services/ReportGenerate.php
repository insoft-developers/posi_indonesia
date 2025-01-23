<?php


namespace App\Services;

use App\Models\ScheduleTesting;

class ReportGenerate {
    public function __invoke()
    {
        ScheduleTesting::create([
            "total" => rand(100, 1000),
            "created_at" => now()
        ]);   
    }
}