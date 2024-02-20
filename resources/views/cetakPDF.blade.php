@section('title', 'Dashboard')
<div class="container-fluid py-4">
    <div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h1>Laporan Peminjaman</h1>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="display table table-bordered align-items-center mb-0 table-hover" border="0.1">
                        <thead>
                        <tr>
                            <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">No.</th>
                            <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Pengguna</th>
                            <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Judul Buku</th>
                            <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Tanggal Peminjaman</th>
                            <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Tanggal Pengembalian</th>
                            <th class="text-center text-uppercase text-white text-xxs font-weight-bolder">Tanggal Dikembalikan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cetak as $item)
                            <tr>
                                <td class="align-middle text-center text-white text-sm">
                                    <div class="mb-0 text-sm font-weight-bold">{{ $loop->iteration }}</div>
                                </td>
                                <td class="align-middle text-center text-white">
                                    <span class="mb-0 text-sm font-weight-bold">{{ $item->user->username }}</span>
                                </td>
                                <td class="align-middle text-center text-white">
                                    <span class="mb-0 text-sm font-weight-bold">{{ $item->book->title }}</span>
                                </td>
                                <td class="align-middle text-center text-white">
                                <span class="text-xs font-weight-bold">{{ $item->rent_date }}</span>
                                </td>
                                <td class="align-middle text-center text-white">
                                <span class="text-xs font-weight-bold">{{ $item->return_date }}</span>
                                </td>
                                <td class="align-middle text-center text-white">
                                <span class="text-xs font-weight-bold">{{ $item->actual_return_date }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

