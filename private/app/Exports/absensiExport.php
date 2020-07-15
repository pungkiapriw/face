<?php

namespace App\Exports;

use App\absensi;
use Maatwebsite\Excel\Concerns\FromCollection;


class absensiExport implements FromCollection
{
    
protected $from;
protected $to;

function __construct($from,$to) {
       $this->from = $from;
       $this->to = $to;
       
}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = "created_at >= '".$this->from."' and created_at <= '".$this->to."'";
        $data = absensi::whereRaw($query)->orderBy('id','desc')->get();   
        return $data;
    }
}
