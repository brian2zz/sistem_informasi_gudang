@extends('layouts.user_type.auth')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    .dataTables_length select {
        padding-left : 10px; /* Sesuaikan ukuran teks yang diinginkan */
        padding-right : 30px; /* Sesuaikan ukuran teks yang diinginkan */
    }
    </style>
<div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Filter</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/laporan-permintaan/filter') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="tanggal_masuk">Mulai Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggal_masuk">Sampai Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn bg-gradient-primary btn-sm mb-0">Filter</button>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Laporan Permintaan</h5>
                        </div>
                        <button type="button" class="btn bg-gradient-primary btn-sm mb-0" onclick="tablesToExcel(['export_laporan_permintaan'], 'LaporanPermintaan' , 'Laporan Permintaan.xls', 'Excel')">
                            +&nbsp; Export
                          </button>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="produk" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item Permintaan Barang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Permintaan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Realisasi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Permintaan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Relasi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Toko</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Total</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tempat Supplier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_request as $Data)
                                <tr>
                                    <td class="ps-4"><p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p></td>
                                    <td class="ps-4"><p class="text-xs font-weight-bold mb-0">{{ $Data->permintaan_barang }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->jumlah_permintaan }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->jumlah_relasi }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->tanggal_permintaan }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->tanggal_relasi }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->toko }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->harga_satuan }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->harga_total }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->keterangan }}</p></td>
                                    <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->tempat_supplier }}</p></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('laporan.tabel-export.table-laporan-permintaan')
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
    $(document).ready(function(){
    $('[data-toggle="modal"]').click(function(){
        var target_modal = $(this).data('target');
        $(target_modal).show();
    });
});
</script>
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