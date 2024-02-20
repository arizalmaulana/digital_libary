<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;
use PDF;

class RentLogController extends Controller
{
    public function index()
    {
        $rentlogs = RentLogs::with('user', 'book')->get();
        return view('rentLog', ['rent_logs' => $rentlogs]);
    }

     // Pastikan Anda telah mengimpor namespace PDF di bagian atas file

public function cetakPDF()
{
    $rentlogs = RentLogs::with('user', 'book')->get();
    $pdf = PDF::loadView('cetakPDF', ['cetak' => $rentlogs])->setpaper('A4', 'portrait')->setOptions(['defaultFont' => 'sans-serif']);

    return $pdf->stream('laporan-peminjaman.pdf');
}
}
