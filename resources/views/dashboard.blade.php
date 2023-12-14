@extends('layouts.user_type.auth')

@section('title', 'dashboard')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    .dataTables_length select {
        padding-left : 10px; /* Sesuaikan ukuran teks yang diinginkan */
        padding-right : 30px; /* Sesuaikan ukuran teks yang diinginkan */
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">Dashboard</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="produk" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder" rowspan="2">Tanggal</th>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder" rowspan="2">Part Number</th>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder" rowspan="2">Nama Barang</th>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder" rowspan="2">Asal Barang</th>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder" colspan="2">Mutasi</th>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder" rowspan="2">Tujuan Barang</th>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder" rowspan="2">Stok</th>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder" rowspan="2">Keterangan</th>
                            </tr>
                            <tr>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder">Masuk</th>
                                <th class="text-uppercase text-center text-secondary font-weight-bolder">Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $Data )
                                @if(isset($Data->id_produk_keluar)) 
                                    @foreach ($produk_keluar as $keluar)
                                        @if($Data->id_produk_keluar == $keluar->id_produk_keluar)
                                            @foreach ($keluar->product as $produk)
                                                <tr>
                                                    <td class="text-center">{{ $keluar->tanggal_keluar }}</td>
                                                    <td class="text-center">{{ $produk->satuan }}</td>
                                                    <td class="text-center">{{ $produk->nama_produk }}</td>
                                                    <td class="text-center">{{ $keluar->supplier->nama_supplier }}</td>
                                                    <td class="text-center"> - </td>
                                                    <td class="text-center">{{ $produk->pivot->jumlah_keluar }}</td>
                                                    <td class="text-center">{{ $keluar->customer->nama_pembeli }}</td>
                                                    <td class="text-center">{{ $produk->pivot->sisa_stok_keluar }}</td>
                                                    <td class="text-center">{{ $keluar->keterangan }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach    
                                @else
                                    @foreach ($produk_masuk as $masuk)
                                        @if($Data->id_produk_masuk == $masuk->id_produk_masuk)
                                            @foreach($masuk->products as $produk)
                                                <tr>
                                                    <td class="text-center">{{ $masuk->tanggal_masuk }}</td>
                                                    <td class="text-center">{{ $produk->satuan }}</td>
                                                    <td class="text-center">{{ $produk->nama_produk }}</td>
                                                    <td class="text-center">{{ $masuk->supplier->nama_supplier }}</td>
                                                    <td class="text-center">{{ $produk->pivot->jumlah_masuk }}</td>
                                                    <td class="text-center"> - </td>
                                                    <td class="text-center">{{ $masuk->customer->nama_pembeli }}</td>
                                                    <td class="text-center">{{ $produk->pivot->sisa_stok_masuk }}</td>
                                                    <td class="text-center">{{ $masuk->keterangan }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>

                         
                    </table>
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
        $('#produk').DataTable({
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
