@extends('layouts.mainlayout')

@section('title', 'Detail Pengguna')
@section('pages', 'Detail Pengguna')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Detail Pengguna</h6>
                    </div>
                    <div class="col-6 text-end">
                        @if ($user->status == 'Tidak Aktif')
                            <a class="btn bg-gradient-info mb-0" href="/konfirmasi/{{ $user->slug }}">Konfirmasi</a>
                        @endif
                    </div>
                </div>
            </div>


            <div class="card-body px-4 pt-3 pb-2">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="align-items-center mb-0">
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" readonly value="{{ $user->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" readonly value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="" id="" cols="30" rows="5" class="form-control" readonly style="resize: none">{{ $user->address }}</textarea>
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Peran</label>
                        <input type="text" class="form-control" readonly value="{{ $user->role_id }}">
                </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        <input type="text" class="form-control" readonly value="{{ $user->status }}">
                    </div>
                </div>
                <div class="card-header pb-0 mt-5">
                    <h6>Laporan Peminjaman</h6>
                </div>
                <x-rent-logs-table :rentlogs='$rent_logs' />
                <hr>
                <div class="text-end mb-3 mt-3">
                    <a class="btn bg-gradient-secondary mb-0" href="/pengguna">Kembali</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
