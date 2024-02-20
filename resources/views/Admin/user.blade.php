@extends('layouts.mainlayout')

@section('title', 'Pengguna')
@section('pages', 'Pengguna')

@section('content')
<div class="container-fluid py-4">
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <button type="button" class="btn bg-gradient-light" data-bs-toggle="tab" data-bs-target="#TabelPetugas">Petugas</button>
        </li>
        <li class="nav-item">
            <button type="button" class="btn bg-gradient-light" data-bs-toggle="tab" data-bs-target="#TabelPengguna">Pengguna</button>
        </li>
        <li class="nav-item">
            <button type="button" class="btn bg-gradient-light" data-bs-toggle="tab" data-bs-target="#TabelAktivasiAkun">Aktivasi Akun</button>
        </li>
    </ul>



    <div class="tab-content">
        <div class="row tab-pane fade" id="TabelPetugas">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Tabel Daftar Petugas</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-light mb-0" href="banned-petugas">Petugas di banned</a>
                            <a class="btn bg-gradient-dark mb-0" href="tambah-petugas"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Petugas</a>
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
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users2 as $item)
                            <tr>
                                <td class="align-middle text-center">
                                <span class="text-uppercase text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->username }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->email }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                <a class="btn btn-link text-dark px-3 mb-0" href="/detail-pengguna/{{ $item->slug }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Detail</a>

                                <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $item->slug }}"><i class="far fa-trash-alt me-2"></i>
                                    Hapus
                                </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteUserLabel">Hapus Pengguna</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus {{ $item->username }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Kembali</button>
                                    <a href="/hapus-pengguna/{{ $item->slug }}" class="btn btn-danger">Hapus</a>
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


    <div class="tab-content">
        <div class="row tab-pane fade" id="TabelPengguna">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Tabel Daftar Pengguna</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-light mb-0" href="banned-pengguna">Pengguna di banned</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users3 as $item)
                            <tr>
                                <td class="align-middle text-center">
                                <span class="text-uppercase text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->username }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->email }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                <a class="btn btn-link text-dark px-3 mb-0" href="/detail-pengguna/{{ $item->slug }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Detail</a>

                                <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $item->slug }}"><i class="far fa-trash-alt me-2"></i>
                                    Hapus
                                </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteUserLabel">Hapus Pengguna</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus {{ $item->username }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Kembali</button>
                                    <a href="/hapus-pengguna/{{ $item->slug }}" class="btn btn-danger">Hapus</a>
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

    <div class="tab-content">
        <div class="row tab-pane fade" id="TabelAktivasiAkun">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Tabel Aktivasi Akun</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td class="align-middle text-center">
                                <span class="text-uppercase text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->username }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $item->email }}</h6>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                <a class="btn btn-link text-dark px-3 mb-0" href="/detail-pengguna/{{ $item->slug }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Detail</a>

                                <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $item->slug }}"><i class="far fa-trash-alt me-2"></i>
                                    Hapus
                                </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteUser{{ $item->slug }}" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteUserLabel">Hapus Pengguna</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus {{ $item->username }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Kembali</button>
                                    <a href="hapus-pengguna/{{ $item->slug }}" class="btn btn-danger">Hapus</a>
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
