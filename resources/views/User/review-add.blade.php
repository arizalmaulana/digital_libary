@extends('layouts.mainlayout')

@section('title', 'Tambah Ulasan')
@section('pages', 'Tambah Ulasan')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tambah Ulasan</h6>
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
            <form action="tambah-ulasan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="align-items-center mb-0">
                    <div class="mb-3">
                        <label for="user" class="form-label">Pengguna</label>
                        @foreach ($users as $item)
                        <input type="text" id="user" class="form-control" value="{{ $item->username }}" aria-label="user" aria-describedby="user-addon" readonly>
                        <input type="hidden" name="user_id" value="{{ $item->id }}">
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="book" class="form-label">Buku</label>
                        <select name="book_id" id="book" class="form-control inputbox">
                            <option value="">Pilih Buku</option>
                            @foreach ($books as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ulasan" class="form-label">Ulasan</label>
                        <input type="text" name="review" id="review" class="form-control" placeholder="Ulasan" aria-label="review" aria-describedby="review-addon" required>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-control">
                            <option value="">Pilih Rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="px-3 py-3 text-end">
                    <a href="ulasan-pengguna" class="btn bg-gradient-secondary mb-0">Kembali</a>
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
        $('.inputbox').select2();
    });
</script>

@endsection
