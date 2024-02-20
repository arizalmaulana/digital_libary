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
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="username-addon" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" aria-label="Name" aria-describedby="name-addon" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" id="address" class="form-control" rows="5" placeholder="Alamat" aria-label="Alamat" aria-describedby="alamat-addon" required></textarea>
                </div>
                <div class="mb-3">
                    <input type="text" name="role_id" value="2" hidden>
                </div>
                <div class="px-3 py-3 text-end">
                    <a href="pengguna" class="btn bg-gradient-secondary mb-0">Kembali</a>
                    <button type="submit" class="btn bg-gradient-dark mb-0">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
