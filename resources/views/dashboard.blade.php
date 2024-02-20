@extends('layouts.mainlayout')

@section('title', 'Dashboard')
@section('pages', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-body p-3">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna</p>
                <h5 class="font-weight-bolder mb-0">
                    {{ $user_count }}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary p-2 shadow text-center border-radius-md">
                    <div class="row">


                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M57.7 193l9.4 16.4c8.3 14.5 21.9 25.2 38 29.8L163 255.7c17.2 4.9 29 20.6 29 38.5v39.9c0 11 6.2 21 16 25.9s16 14.9 16 25.9v39c0 15.6 14.9 26.9 29.9 22.6c16.1-4.6 28.6-17.5 32.7-33.8l2.8-11.2c4.2-16.9 15.2-31.4 30.3-40l8.1-4.6c15-8.5 24.2-24.5 24.2-41.7v-8.3c0-12.7-5.1-24.9-14.1-33.9l-3.9-3.9c-9-9-21.2-14.1-33.9-14.1H257c-11.1 0-22.1-2.9-31.8-8.4l-34.5-19.7c-4.3-2.5-7.6-6.5-9.2-11.2c-3.2-9.6 1.1-20 10.2-24.5l5.9-3c6.6-3.3 14.3-3.9 21.3-1.5l23.2 7.7c8.2 2.7 17.2-.4 21.9-7.5c4.7-7 4.2-16.3-1.2-22.8l-13.6-16.3c-10-12-9.9-29.5 .3-41.3l15.7-18.3c8.8-10.3 10.2-25 3.5-36.7l-2.4-4.2c-3.5-.2-6.9-.3-10.4-.3C163.1 48 84.4 108.9 57.7 193zM464 256c0-36.8-9.6-71.4-26.4-101.5L412 164.8c-15.7 6.3-23.8 23.8-18.5 39.8l16.9 50.7c3.5 10.4 12 18.3 22.6 20.9l29.1 7.3c1.2-9 1.8-18.2 1.8-27.5zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>
                </svg>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-body p-3">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Kategori</p>
                <h5 class="font-weight-bolder mb-0">
                    {{ $category_count }}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary p-2 text-center border-radius-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/>
                    </svg>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
        <div class="card-body p-3">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Buku</p>
                <h5 class="font-weight-bolder mb-0">
                    {{ $book_count }}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary p-2 text-center border-radius-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                    </svg>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>


    <div class="row mt-5">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 mb-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Laporan Peminjaman</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a class="btn bg-gradient-info mb-0" href="cetak-pdf">Cetak PDF</a>
                    </div>
                </div>
            </div>
            <x-rent-logs-table :rentlogs='$rent_logs' />
        </div>
    </div>
    </div>

@endsection
