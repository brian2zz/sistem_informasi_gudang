@extends('layouts.user_type.auth')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
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
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Tabel Produk Masuk</h5>
                            </div>
                            @if (Auth::user()->role != 'user')
                                <a href="{{ url('produk-masuk/tambah') }}" type="button"
                                    class="btn bg-gradient-primary btn-sm mb-0">
                                    +&nbsp; Tambah Produk Masuk
                                </a>
                            @endif
                        </div>
                    </div>

                    @foreach ($produk_masuk as $Produk_masuk)
                        <div class="modal fade" id="detailProdukMasuk{{ $loop->iteration }}" tabindex="-1"
                            aria-labelledby="detailProdukMasukLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Produk Masuk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">Tanggal Masuk </label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">{{ $Produk_masuk->tanggal_masuk }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">Supplier </label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">{{ $Produk_masuk->supplier->nama_supplier }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">Tujuan </label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">{{ $Produk_masuk->customer->nama_pembeli }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">Keterangan </label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">{{ $Produk_masuk->keterangan }}</label>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="produk" class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            No Kartu
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Nama Produk
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Kategori
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Part Number
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Jumlah Masuk
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Stok
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Produk_masuk->products as $produk)
                                                        <tr>
                                                            <td class="ps-4">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $produk->no_kartu }}</p>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $produk->nama_produk }}</p>
                                                            </td>
                                                            <td class="ps-sm-4">
                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                    {{ $produk->category_products->nama_kategori_produk }}
                                                                </p>
                                                            </td>
                                                            <td class="ps-sm-4">
                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                    {{ $produk->satuan }}</p>
                                                            </td>
                                                            <td class="ps-sm-4">
                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                    {{ $produk->pivot->jumlah_masuk }}</p>
                                                            </td>
                                                            <td class="ps-sm-4">
                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                    {{ $Produk_masuk->submit == 1 ? $produk->pivot->sisa_stok_masuk : $produk->stok + $produk->pivot->jumlah_masuk }}
                                                                </p>
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
                    @endforeach

                    {{-- <!-- @include('data-master.produk.add-produk')
                @include('data-master.produk.edit-produk') --> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="produk_masuk" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Masuk
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Supplier
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Keterangan
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Submit
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk_masuk as $Produk_masuk)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $Produk_masuk->tanggal_masuk }}
                                                </p>
                                            </td>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $Produk_masuk->supplier->nama_supplier }}</p>
                                            </td>
                                            <td class="ps-sm-4">
                                                <p class="text-xs font-weight-bold mb-0 ">{{ $Produk_masuk->keterangan }}
                                                </p>
                                            </td>
                                            <td class="ps-sm-4">
                                                <i
                                                    class="fas {{ $Produk_masuk->submit == 1 ? 'fa-check' : 'fa-xmark' }} font-weight-bold mb-0"></i>
                                            </td>
                                            <td>
                                                <a href="#" class="mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#detailProdukMasuk{{ $loop->iteration }}">
                                                    <i class="fas fa-table-list text-secondary"></i>
                                                </a>
                                                @if (Auth::user()->role != 'user')
                                                    <a href="/produk-masuk-edit/{{ $Produk_masuk->id_produk_masuk }}"
                                                        onclick="return {{ $Produk_masuk->submit == 1 ? 'false' : 'true' }}"
                                                        class="mx-1">
                                                        <i class="fas fa-pen text-secondary"></i>
                                                    </a>
                                                    <a href="{{ url('produk-masuk/delete/' . $Produk_masuk->id_produk_masuk) }}"
                                                        onclick="{{ $Produk_masuk->submit == 1 ? 'return false' : "return confirm('Apakah Anda yakin ingin menghapus data ini?')" }}"
                                                        class="mx-1">
                                                        <span>
                                                            <i class="fas fa-trash text-secondary"></i>
                                                        </span>
                                                    </a>
                                                    <a href="{{ url('produk-masuk/submit/' . $Produk_masuk->id_produk_masuk) }}"
                                                        onclick="return {{ $Produk_masuk->submit == 1 ? 'false' : 'true' }}"
                                                        class="mx-1">
                                                        <span>
                                                            <i class="fas fa-square-check text-secondary"></i>
                                                        </span>
                                                    </a>
                                                @endif
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="modal"]').click(function() {
                var target_modal = $(this).data('target');
                $(target_modal).show();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#produk_masuk').DataTable({
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
