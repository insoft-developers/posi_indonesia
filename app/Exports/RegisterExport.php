<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RegisterExport implements FromView, ShouldAutoSize
{
    
    

    protected $data;
    protected $com;
    public function __construct($data, $competition)
    {
        $this->data = $data;
        $this->com = $competition;
    }
    


    public function view(): View
    {
        
        return view('backend.transaction.template_register_export', [
            'data' => $this->data,
            'com' => $this->com
        ]);   
    }

   
}
