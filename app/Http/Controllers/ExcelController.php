<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\XxxExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function Exceldsnhanviens(){
        // Excel::create('nhanviens',function($excel){
        //     $excel->sheet('nhanviens',function($sheet){
        //         $sheet->loadView('danhmuc.dsnv');

        //         dd($sheet);
        //     });
        // })->export('xlsx');
        return Excel::download(new XxxExport, 'xxxx.xlsx');
    }
}
