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
                            <h5 class="mb-0">Tabel Supplier</h5>
                        </div>
                        @if (Auth::user()->role != 'user')
                        <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#addSupplier">
                            +&nbsp; Tambah Supplier
                          </button>
                        @endif
                    </div>
                </div>
                @include('data-master.supplier.add-supplier')
                @include('data-master.supplier.edit-supplier')
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="produk" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Supplier
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No Telp
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Alamat
                                    </th>
                                    @if (Auth::user()->role != 'user')
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($supplier as $Supplier)
                                    @if($Supplier->status != 2)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $Supplier->nama_supplier }}</p>
                                            </td>
                                            <td >
                                                <p class="text-xs font-weight-bold mb-0">{{ $Supplier->no_telp }}</p>
                                            </td>
                                            <td class="ps-sm-4">
                                                <p class="text-xs font-weight-bold mb-0 ">{{ $Supplier->alamat }}</p>
                                            </td>
                                            @if (Auth::user()->role != 'user')
                                            <td >
                                                <a href="#" class="mx-3" data-toggle="modal" data-target="#editSupplier{{ $Supplier->id_supplier }}">
                                                    <i class="fas fa-pen text-secondary"></i>
                                                </a>
                                                <a href="{{ url('/supplier/delete-supplier/'. $Supplier->id_supplier ) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <span>
                                                        <i class="fas fa-trash text-secondary"></i>
                                                    </span>
                                                </a>
                                            </td>
                                            @endif
                                        </tr>
                                    @endif
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