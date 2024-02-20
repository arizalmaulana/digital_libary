@extends('layouts.mainlayout')

@section('title', 'Laporan peminjaman')
@section('pages', 'Laporan peminjaman')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Laporan Peminjaman</h6>
            </div>
            <div class="col-6 text-end">
                <a class="btn bg-gradient-info mb-0" href="cetak-pdf">Cetak PDF</a>
            </div>
            <x-rent-logs-table :rentlogs='$rent_logs' />
        </div>
    </div>
    </div>
</div>
@endsection
