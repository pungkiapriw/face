<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\absensi;
use App\Exports\ListExport;

class PostsController extends Controller
{
  /**
   * Get list of articles
   */
  public function index()
  {
//  
  }

  /**
   * Export to excel
   */
  public function exportExcel()
  {
    return Excel::download(new ListExport, 'list.xlsx');
  }

  /**
   * Export to csv
   */
  public function exportCSV()
  {
    return Excel::download(new ListExport, 'list.csv');
  }
}