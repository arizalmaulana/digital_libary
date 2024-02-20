@extends('layouts.mainlayout')

@section('title', 'Pulihkan Kategori')
@section('pages', 'Pulihkan Kategori')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Kategori yang telah dihapus</h6>
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
                    @foreach ($deletedCategories as $item)
                    <tr>
                        <td class="text-center align-middle px-4">
                        <span class="text-uppercase text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <div>
                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->category_name }}</h6>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                        <a class="btn btn-link text-dark px-3 mb-0" href="/restore-kategori/{{ $item->slug }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Pulihkan</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-3 py-3 text-end">
                    <a href="/kategori" class="btn bg-gradient-secondary mb-0">Kembali</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection
