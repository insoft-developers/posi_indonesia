<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PesananExport implements FromView, ShouldAutoSize
{
    
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    
  
    public function view(): View
    {
        
        return view('backend.transaction.download_pesanan', [
            'data' => $this->data
        ]);   
    }
}
