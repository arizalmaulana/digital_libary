@extends('layouts.mainlayout')

@section('title', 'Buku')
@section('pages', 'Buku')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tabel Buku</h6>
                </div>
                <div class="col-6 text-end">
                    <a class="btn bg-gradient-light mb-0" href="pulihkan-buku">Pulihkan Buku</a>
                    <a class="btn bg-gradient-dark mb-0" href="tambah-buku"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Buku</a>
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Buku</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori Buku</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penulis</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerbit</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Terbit</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                            </td>
                            <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $item->book_code }}</span>
                            </td>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/notfound.jpg') }}" class="avatar avatar-sm me-3" alt="">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm text-wrap" style="width: 12rem;">{{ $item->title }}</h6>
                                </div>
                            </div>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">@foreach ($item->categories as $category)
                                    {{ $category->category_name }} <br>
                                    @endforeach</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $item->author }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $item->publisher }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $item->published }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-{{ $item->status == 'Tersedia' ? 'success' : 'danger' }}">{{ $item->status }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <a class="btn btn-link text-dark px-3 mb-0" href="/edit-buku/{{ $item->slug }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Detail</a>

                                <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#deleteBook{{ $item->slug }}"><i class="far fa-trash-alt me-2"></i>
                                    Hapus
                                </button>
                            </td>
                                <!-- Modal -->
                            <div class="modal fade" id="deleteBook{{ $item->slug }}" tabindex="-1" aria-labelledby="deleteBookLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteBookLabel">Hapus Kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus kategori {{ $item->title }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Kembali</button>
                                    <a href="/hapus-buku/{{ $item->slug }}" class="btn btn-danger">Hapus</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
