@extends('layouts.mainlayout')

@section('title', 'Tambah Buku')
@section('pages', 'Tambah Buku')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tambah Buku</h6>
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
            <form action="tambah-buku" method="post" enctype="multipart/form-data">
                @csrf
                <div class="align-items-center mb-0">
                    <div class="mb-3">
                        <label for="book_code" class="form-label">kode Buku</label>
                        <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Kode Buku" aria-label="book_code" aria-describedby="book_code-addon" value="{{ old('book_code') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Buku</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Judul Buku" aria-label="Title" aria-describedby="title-addon" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori Buku</label>
                        <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Sampul Buku</label>
                        <input type="file" name="image" id="cover" class="form-control" placeholder="Judul Buku" aria-label="Cover" aria-describedby="cover-addon" value="{{ old('cover') }}">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Penulis Buku</label>
                        <input type="text" name="author" id="author" class="form-control" placeholder="Penulis Buku" aria-label="Author" aria-describedby="author-addon" value="{{ old('author') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Penerbit Buku</label>
                        <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Penerbit Buku" aria-label="Publisher" aria-describedby="publisher-addon" value="{{ old('publisher') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="published" class="form-label">Tahun Terbit Buku</label>
                        <input type="text" name="published" id="published" class="form-control" placeholder="Tahun Terbit Buku" aria-label="Published" aria-describedby="published-addon" value="{{ old('published') }}" required>
                    </div>
                </div>

                <div class="px-3 py-3 text-end">
                    <a href="buku" class="btn bg-gradient-secondary mb-0">Kembali</a>
                    <button type="submit" class="btn bg-gradient-dark mb-0">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>

@endsection
