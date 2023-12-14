@extends('layouts.user_type.auth')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .dataTables_length select {
            padding-left: 10px;
            /* Sesuaikan ukuran teks yang diinginkan */
            padding-right: 30px;
            /* Sesuaikan ukuran teks yang diinginkan */
        }
    </style>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4 ">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Detail Produk</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mb-4 mx-4 mr-1">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="id_produk">Nomor Kartu</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_produk">{{ $Produk->no_kartu }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="id_produk">Nama Produk</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_produk">{{ $Produk->nama_produk }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="id_produk">Part Number</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_produk">{{ $Produk->satuan }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="id_produk">Stok</label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_produk">{{ $Produk->stok }}</label>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="detailProduk" class="table align-items-center mb-0 detail_produk">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2">Tanggal</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2">Asal Barang</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            colspan="2">Mutasi</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2">Tujuan Barang</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2">Keterangan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            rowspan="2">Jumlah Stok</th>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Masuk
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keluar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $Data)
                                        @if (isset($Data->id_produk_keluar))
                                            @foreach ($produk_keluar as $keluar)
                                                @if ($Data->id_produk_keluar == $keluar->id_produk_keluar)
                                                    @foreach ($keluar->product as $produk)
                                                        @if ($produk->id_produk == $Produk->id_produk)
                                                            <tr>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $keluar->tanggal_keluar }}</td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $keluar->supplier->nama_supplier }}
                                                                </td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0"> - </td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $produk->pivot->jumlah_keluar }}</td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $keluar->customer->nama_pembeli }}
                                                                </td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $keluar->keterangan }}</td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $produk->pivot->sisa_stok_keluar }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($produk_masuk as $masuk)
                                                @if ($Data->id_produk_masuk == $masuk->id_produk_masuk)
                                                    @foreach ($masuk->products as $produk)
                                                        @if ($produk->id_produk == $Produk->id_produk)
                                                            <tr>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $masuk->tanggal_masuk }}</td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $masuk->supplier->nama_supplier }}
                                                                </td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $produk->pivot->jumlah_masuk }}</td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0"> - </td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $masuk->customer->nama_pembeli }}
                                                                </td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $masuk->keterangan }}</td>
                                                                <td class="ps-4 text-xs font-weight-bold mb-0">
                                                                    {{ $produk->pivot->sisa_stok_masuk }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="row px-4">
                        <div class="form-group">
                            <a href="/produk" class="btn btn-secondary">
                                kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('js/export.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.detail_produk').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<",
                        "next": ">"
                    }
                }
            });
        });
    </script>
@endsection
