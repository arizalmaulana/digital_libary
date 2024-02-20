@extends('layouts.mainlayout')

@section('title', 'Kategori')
@section('pages', 'Kategori')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tabel Kategori</h6>
                </div>
                <div class="col-6 text-end">
                    <a class="btn bg-gradient-light mb-0" href="pulihkan-kategori">Pulihkan Kategori</a>
                    <a class="btn bg-gradient-dark mb-0" href="tambah-kategori"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Kategori</a>
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
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                        <td class="align-middle text-center">
                        <span class="text-uppercase text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <div>
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->category_name }}</h6>

                            </div>

                        </td>
                        <td class="align-middle text-center">
                        <a class="btn btn-link text-dark px-3 mb-0" href="edit-kategori/{{ $item->slug }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>

                        <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#deleteCategory{{ $item->slug }}"><i class="far fa-trash-alt me-2"></i>
                            Hapus
                        </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteCategory{{ $item->slug }}" tabindex="-1" aria-labelledby="deleteCategoryLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteCategoryLabel">Hapus Kategori</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus kategori {{ $item->category_name }}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Kembali</button>
                            <a href="hapus-kategori/{{ $item->slug }}" class="btn btn-danger">Hapus</a>
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

@endsection
