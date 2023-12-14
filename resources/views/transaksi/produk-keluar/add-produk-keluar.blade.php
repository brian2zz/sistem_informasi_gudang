@extends('layouts.user_type.auth')

@section('content')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> --}}
    
    <style>
        .dataTables_length select {
            padding-left: 10px;
            /* Sesuaikan ukuran teks yang diinginkan */
            padding-right: 30px;
            /* Sesuaikan ukuran teks yang diinginkan */
        }
        /* CSS kustom untuk Select2 */
        /* CSS untuk Select2 */
        .select2-container .select2-selection {
            border: 1px solid #d2d6da;
            border-radius: 0.5rem;
            
        }

    </style>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4 ">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Tambah Produk Keluar</h5>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="card-body mb-4 mx-4 mr-1">
                        <form method="POST" action="{{ url('/produk-keluar/tambah/action') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customer">Customer</label>
                                    <select class="form-control" id="customer" name="customer" required>
                                        <option disabled value="" selected>Pilih Customer</option>
                                        @foreach ($customer as $Customer)
                                            <option data-tokens="algk" value="{{ $Customer->id_pembeli }}">{{ $Customer->nama_pembeli }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                  

                                <div class="form-group col-md-6">
                                    <label for="customer">Asal Barang</label>
                                    <select class="form-control" name="supplier" id="tujuan" required>
                                        <option disabled value="" selected>Pilih Asal Barang</option>
                                        @foreach ($supplier as $Supplier)
                                            <option data-tokens="algk" value="{{ $Supplier->id_supplier }}">
                                                {{ $Supplier->nama_supplier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tanggal_masuk">Tanggal Keluar</label>
                                    <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            </div>
                            <div id=user_table>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="id_produk">ID Produk</label>
                                        <select class="form-control" name="produk[]" id="produk">
                                            <option disabled value="" selected>Pilih Produk</option>
                                            @foreach ($produk as $Produk)
                                                <option data-tokens="algk" value="{{ $Produk->id_produk }}">
                                                    {{ $Produk->no_kartu }} - {{ $Produk->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jumlah_masuk">Jumlah Keluar</label>
                                        <input type="number" class="form-control" id="jumlah_keluar" name="jumlah_keluar[]" required>
                                    </div>
                                    <div class="form-group col mt-4 pt-1">
                                        <button class="btn btn-secondary"
                                        name="add_table" id="add_table">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a href="/produk-keluar" class="btn btn-secondary">
                                        kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                        

                    </div>
                    

                </div>
            </div>
            
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> --}}

    {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#customer').select2();
        });

        $(document).ready(function() {
            $('#produk').select2();
        });
        $(document).ready(function() {
            $('#tujuan').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
        var i = 1;
        $('#add_table').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            i++;
            
            $('#user_table').append('<div class="row" id="row_user_table' + i +'">'+
                    '<div class="form-group col-md-3">'+
                            '<label for="id_produk">ID Produk</label>'+
                                '<select class="form-control" name="produk[]" id="produk'+i+'">'+
                                    '<option disabled value="" selected>Pilih Produk</option>'+
                                    '@foreach ($produk as $Produk)'+
                                        '<option data-tokens="algk" value="{{ $Produk->id_produk }}">'+
                                            '{{ $Produk->no_kartu }} - {{ $Produk->nama_produk }}</option>'+
                                    '@endforeach'+
                                '</select>'+
                        '</div>'+
                        '<div class="form-group col-md-3">'+
                            '<label for="jumlah_masuk">Jumlah Keluar</label>'+
                            '<input type="number" class="form-control" id="jumlah_keluar" name="jumlah_keluar[]" required>'+
                        '</div>'+
                        '<div class="form-group col mt-4 pt-1">'+
                            '<button class="btn btn-secondary btn_remove"name="remove" id="'+i+'">-</button>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            $('#produk'+i).select2();
               
        });
        $(document).on('click', '.btn_remove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var button_id = $(this).attr("id");
            $('#row_user_table' + button_id + '').remove();
        });
    });
    </script>
    <script>
        


    </script>
      
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
@endsection
