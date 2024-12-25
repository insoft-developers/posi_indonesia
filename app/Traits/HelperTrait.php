<?php
namespace App\Traits;

trait HelperTrait
{
     public function generate_number($digits) {
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
     }

     public function tambah_jam($tambahan, $waktu) {
         $tambah = $tambahan.' hours';

         $date = date_create(date($waktu));
         date_add($date, date_interval_create_from_date_string($tambah));
         return date_format($date, 'Y-m-d H:i:s');
    
     }
}
