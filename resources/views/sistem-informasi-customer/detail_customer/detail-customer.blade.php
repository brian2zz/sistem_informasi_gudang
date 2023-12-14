@extends('sistem-informasi-customer.layouts.app')

@section('content-sistem-customer')
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
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <h6 for="id_produk" class='col-md-3'>Nama PT</h6>
                                    {{-- <div class="form-group col-md-2">
                                    </div> --}}
                                    <h6 for="id_produk" class='col'>{{ $customer->nama_pt }}</h6>
                                    {{-- <div class="form-group col">
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <h6 for="id_produk" class='col-md-3'>Alamat</h6>
                                    <h6 for="id_produk" class='col'>{{ $customer->alamat }}</h6>
                                    {{-- <div class="form-group col-md-2">
                                    </div>
                                    <div class="form-group col">
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col">
                                <div class=" d-flex justify-content-end">
                                    <button type="button" class="btn bg-gradient-primary btn-sm " data-bs-toggle="modal"
                                        data-bs-target="#addCustomer">
                                        +&nbsp; Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('sistem-informasi-customer.detail_customer.add-detail-customer')
                    @include('sistem-informasi-customer.detail_customer.edit-detail-customer')
                    @include('sistem-informasi-customer.detail_customer.info-detail-customer')
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="produk" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Tanggal
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ATTN
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Type
                                        </th>
                                        
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            nota
                                        </th>
                                        
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer->detail_customer as $Customer)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $Customer->tanggal }}</p>
                                            </td>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $Customer->attn }}</p>
                                            </td>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $Customer->type }}</p>
                                            </td>
                                            <td class="ps-sm-4">
                                                <p class="text-xs font-weight-bold mb-0 ">{{ $Customer->nota }}</p>
                                            </td>
                                            <td >
                                                <a href="#" class="mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#detail{{ $loop->iteration }}">
                                                    <i class="fas fa-table-list text-secondary"></i>
                                                </a>
                                                <a href="#" class="mx-3" data-toggle="modal" data-target="#editCustomer{{ $Customer->id }}">
                                                    <i class="fas fa-pen text-secondary"></i>
                                                </a>
                                                <a href="{{ url('/detail-customer/'. $Customer->id.'/delete' ) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <span>
                                                        <i class="fas fa-trash text-secondary"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="form-group pt-4">
                                <a href="/sistem-customer/customer" class="btn btn-secondary">
                                    kembali
                                </a>
                            </div>
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
    <script>
        $(document).ready(function() {
        var i = 1;
        $('#add_item').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            i++;
            
            $('#sparepart').append(
                '<div class="form-group row" id="row_sparepart' + i +'">'+
                        '<div class="col-sm-10">'+
                            '<input type="text" class="form-control" id="#" name="sparepart[]" required>'+
                        '</div>'+
                        '<div class="col">'+
                            '<button class="btn btn-secondary btn_remove"name="remove" id="'+i+'">-</button>'+
                        '</div>'+   
                    '</div>'
                    );
            $('#produk'+i).select2();
               
        });
        $(document).on('click', '.btn_remove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var button_id = $(this).attr("id");
            $('#row_sparepart' + button_id + '').remove();
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            var i = 2;
            $(document).on('click', '.btn_edit', function(e) {
                const button_edit = $(this).attr("id");
                // console.log("row_EditDragDrop'+ button_edit +'_' + i +'");
                e.preventDefault();
                e.stopPropagation();
                i++;
                $('#editSparepart'+button_edit).append(
                    '<div class="form-group row" id="row_EditSparepart' +button_edit+'_'+i+'">'+
                        '<div class="col-sm-10">'+
                            '<input type="text" class="form-control" id="#" name="sparepart[]" required>'+
                        '</div>'+
                        '<div class="col">'+
                            '<button class="btn btn-secondary btn_remove" name="remove" id="'+button_edit+'_'+i+'">-</button>'+
                        '</div>'+   
                    '</div>'
                );
                    $('.selectpicker').selectpicker('render');
            });
            $(document).on('click', '.btn_remove', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const button_id = $(this).attr("id");
                
                $('#row_EditSparepart'+ button_id+'').remove();
            });
        });
    </script>
@endsection
