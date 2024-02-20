@extends('layouts.mainlayout')

@section('title', 'Tambah Kategori')
@section('pages', 'Tambah Kategori')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tambah Kategori</h6>
                </div>

            </div>
        </div>
        <div class="card-body px-4  pt-3 pb-2">
            <div class="row">
                <div class="col-6">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <form action="tambah-kategori" method="post">
                @csrf
                <div class="align-items-center mb-0">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Kategori</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Kategori" aria-label="Kategori" aria-describedby="category_name-addon" required>
                    </div>
                </div>

                <div class="px-3 py-3 text-end">
                    <a href="kategori" class="btn bg-gradient-secondary mb-0">Kembali</a>
                    <button type="submit" class="btn bg-gradient-dark mb-0">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
