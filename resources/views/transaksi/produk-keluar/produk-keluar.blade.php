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
                                <h5 class="mb-0">Tabel Produk Keluar</h5>
                            </div>
                            @if (Auth::user()->role != 'user')
                                <a href="{{ url('produk-keluar/tambah') }}" type="button"
                                    class="btn bg-gradient-primary btn-sm mb-0">
                                    +&nbsp; Tambah Produk Keluar
                                </a>
                            @endif
                        </div>
                    </div>

                    @foreach ($produk_keluar as $Produk_keluar)
                        <div class="modal fade" id="detailProdukKeluar{{ $loop->iteration }}" tabindex="-1"
                            aria-labelledby="detailProdukKeluarLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Produk Keluar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">Tanggal Keluar </label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">{{ $Produk_keluar->tanggal_keluar }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">Customer </label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">{{ $Produk_keluar->customer->nama_pembeli }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">Asal Barang </label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">{{ $Produk_keluar->supplier->nama_supplier }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">Keterangan </label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_produk">{{ $Produk_keluar->keterangan }}</label>
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
                                                            Jumlah Keluar
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Stok
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Produk_keluar->product as $produk)
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
                                                                    {{ $produk->pivot->jumlah_keluar }}</p>
                                                            </td>
                                                            <td class="ps-sm-4">
                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                    {{ $Produk_keluar->submit == 1 ? $produk->pivot->sisa_stok_keluar : $produk->stok - $produk->pivot->jumlah_keluar }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="produk_keluar" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Keluar
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
                                    @foreach ($produk_keluar as $Produk_keluar)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $Produk_keluar->tanggal_keluar }}</p>
                                            </td>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $Produk_keluar->customer->nama_pembeli }}</p>
                                            </td>
                                            <td class="ps-sm-4">
                                                <p class="text-xs font-weight-bold mb-0 ">{{ $Produk_keluar->keterangan }}
                                                </p>
                                            </td>
                                            <td class="ps-sm-4">
                                                <i
                                                    class="fas {{ $Produk_keluar->submit == 1 ? 'fa-check' : 'fa-xmark' }} font-weight-bold mb-0"></i>
                                            </td>
                                            <td>
                                                <a href="#" class="mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#detailProdukKeluar{{ $loop->iteration }}">
                                                    <i class="fas fa-table-list text-secondary"></i>
                                                </a>
                                                @if (Auth::user()->role != 'user')
                                                    <a href="/produk-keluar-edit/{{ $Produk_keluar->id_produk_keluar }}"
                                                        onclick="return {{ $Produk_keluar->submit == 1 ? 'false' : 'true' }}"
                                                        class="mx-1">
                                                        <i class="fas fa-pen text-secondary"></i>
                                                    </a>
                                                    <a href="{{ url('produk-keluar/delete/' . $Produk_keluar->id_produk_keluar) }}"
                                                        onclick="{{ $Produk_keluar->submit == 1 ? 'return false' : "return confirm('Apakah Anda yakin ingin menghapus data ini?')" }}"
                                                        class="mx-1">
                                                        <span>
                                                            <i class="fas fa-trash text-secondary"></i>
                                                        </span>
                                                    </a>
                                                    <a href="{{ url('produk-keluar/submit/' . $Produk_keluar->id_produk_keluar) }}"
                                                        onclick="return {{ $Produk_keluar->submit == 1 ? 'false' : 'true' }}"
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
            $('#produk_keluar').DataTable({
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
