@extends('layouts.mainlayout')

@section('title', 'Pengembalian Buku')
@section('pages', 'Pengembalian Buku')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Pengembalian Buku</h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 px-4">
                        @if (session('message'))
                            <div class="alert {{ session('alert-class') }}">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body px-4 pt-3 pb-2">
                    <form action="pengembalian-buku" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="user" class="form-label">Pengguna</label>
                            <select name="user_id" id="user" class="form-control inputbox">
                                <option value="">Pilih Pengguna</option>
                                @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="book" class="form-label">Buku</label>
                            <select name="book_id" id="book" class="form-control inputbox">
                                <option value="">Pilih Buku</option>
                                @foreach ($books as $item)
                                <option value="{{ $item->id }}">{{ $item->book_code }} {{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn bg-gradient-secondary mb-0">Simpan</button>
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
