<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftaranExport implements FromView, ShouldAutoSize
{
   
    
  

   

    public function view(): View
    {
        
        return view('backend.transaction.template_pendaftaran');   
    }

   
}
