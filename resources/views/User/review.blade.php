@extends('layouts.mainlayout')

@section('title', 'Ulasan Pengguna')
@section('pages', 'Ulasan Pengguna')

@section('content')
<div class="container-fluid py-4">

    <div class="tab-content">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Tabel Ulasan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="tambah-ulasan"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Ulasan</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 px-4">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengguna</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Buku</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ulasan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $item)
                            @csrf
                            <tr>
                                <td class="align-middle text-center">
                                <span class="text-uppercase text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->user->username }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->book->title }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-wrap" style="width: 12rem;">
                                    <div>
                                    <div class="d-flex flex-column text-center">
                                    <h6 class="mb-0 text-sm">{{ $item->review }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->rating }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#deleteReviews{{ $item->id }}"><i class="far fa-trash-alt me-2"></i>
                                    Hapus
                                </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteReviews{{ $item->id }}" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteUserLabel">Hapus Ulasan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus ulasan dari {{ $item->user->username }} pada buku {{ $item->book->title }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Kembali</button>
                                    <a href="/hapus-ulasan/{{ $item->id }}" class="btn btn-danger">Hapus</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
