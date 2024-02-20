@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('pages', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($books as $item)
            <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card h-50">
                        <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/notfound.jpg') }}" class="card-img-top h-100" draggable="false">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->book_code }}</h5>
                        <p class="card-text">{{ $item->title }}</p>
                        <div class="align-bottom text-end text-sm text-justify-end">
                            <span class="badge badge-sm bg-gradient-{{ $item->status == 'Tersedia' ? 'success' : 'danger' }}">{{ $item->status }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
