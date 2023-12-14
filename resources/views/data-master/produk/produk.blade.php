@extends('layouts.user_type.auth')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="../assets/css/cdn-table.css" rel="stylesheet" />

    <style>
        .dataTables_length select {
            padding-left: 10px;
            /* Sesuaikan ukuran teks yang diinginkan */
            padding-right: 30px;
            /* Sesuaikan ukuran teks yang diinginkan */
        }
    </style>

    <div>
        @if (session('Error'))
            <div class="alert alert-danger" style="color:#fff;">
                <!-- Icon Close Bootstrap -->
                <button type="button" class="btn-close col"data-dismiss="alert" aria-label="Close"></button>
                {{ session('Error') }}
            </div>
        @endif


        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Tabel Produk</h5>
                            </div>
                            @if (Auth::user()->role != 'user')
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn bg-gradient-primary btn-sm mb-0"
                                            data-bs-toggle="modal" data-bs-target="#importProduk">
                                            Import
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn bg-gradient-primary btn-sm mb-0"
                                            data-bs-toggle="modal" data-bs-target="#addProduk">
                                            +&nbsp;Tambah
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal fade" id="importProduk" tabindex="-1" aria-labelledby="importProdukLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Import Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ url('/produk/import') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="file">Pilih file Excel:</label>
                                            <input type="file" name="file" id="file"
                                                class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}">
                                            @if ($errors->has('file'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('file') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">tambah</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @include('data-master.produk.add-produk')
                    @include('data-master.produk.edit-produk')
                    {{-- @include('data-master.produk.detail-produk') --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="produk" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor Kartu
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Produk
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kategori
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Part Number
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Stok
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            {{-- @include('data-master.produk.table-produk') --}}
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
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     $('[data-toggle="modal"]').click(function() {
        //         var target_modal = $(this).data('target');
        //         $(target_modal).show();
        //     });
        // });
        $('#editProduk').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idProduk = button.data('id');
            var noKartuProduk = button.data('kartu');
            var namaProduk = button.data('nama');
            var kategoriProduk = button.data('kategori');
            var satuanProduk = button.data('satuan');
            var stokProduk = button.data('stok');

            // Mengisi data ke dalam modal
            $('#editIdProduk').val(idProduk);
            $('#editNoKartuProduk').val(noKartuProduk);
            $('#editNamaProduk').val(namaProduk);
            $('#editKategoriProduk').val(kategoriProduk);
            $('#editSatuanProduk').val(satuanProduk);
            $('#editStokProduk').val(stokProduk);
            // console.log(kategoriProduk);
            $.ajax({
                url: '/get-kategori', // Ganti dengan URL yang sesuai
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Mengosongkan dropdown terlebih dahulu
                    $('#editKategoriProduk').empty();

                    // Mengisi dropdown dengan data dari server
                    $.each(response.data, function(index, category) {
                        var option = '<option value="' + category.id_kategori_produk + '"';
                        if (category.id_kategori_produk == kategoriProduk) {
                            option += ' selected';
                        }
                        option += '>' + category.nama_kategori_produk + '</option>';
                        $('#editKategoriProduk').append(option);
                    });
                }
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
                },
                processing: true,
                serverSide: true,
                ajax: "{{ url('get-produk') }}",
                autoWidth: false,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        text: 'Export ke Excel',

                        filename: 'data_produk', // Ubah nama file sesuai kebutuhan
                    },
                    {
                        extend: 'print',
                        text: 'Print Data',

                    },
                    {
                        extend: 'pageLength',
                        text: 'Page',
                    },

                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                columns: [{
                        data: 'no_kartu',
                        name: 'no_kartu',
                        className: 'ps-4 text-sm font-weight-bold mb-0'
                    },
                    {
                        data: 'nama_produk',
                        name: 'nama_produk',
                        className: 'ps-4 text-sm font-weight-bold mb-0'
                    },
                    {
                        data: 'category_products',
                        name: 'category_products.nama_kategori_produk',
                        className: 'ps-4 text-sm font-weight-bold mb-0',
                        render: function(data) {
                            return data.nama_kategori_produk;
                        }

                    },
                    {
                        data: 'satuan',
                        name: 'satuan',
                        className: 'ps-4 text-sm font-weight-bold mb-0'
                    },
                    {
                        data: 'stok',
                        name: 'stok',
                        className: 'ps-4 text-sm font-weight-bold mb-0'
                    },
                    {
                        data: null,
                        className: 'ps-4 text-sm font-weight-bold mb-0',
                        render: function(data, type, row) {
                            // Tambahkan tautan dan ikon tindakan di sini
                            var actions =
                                '<a href="{{ url('/detail-produk/') }}/'+row.id_produk+'" class="mx-1"'+
                                '"><i class="fas fa-table-list text-secondary"></i></a>';

                            @if (Auth::user()->role != 'user')
                                actions +=
                                    '<a href="#" class="mx-3" data-toggle="modal" data-target="#editProduk"' +
                                    'data-id="' + row.id_produk + '"' +
                                    'data-kartu="' + row.no_kartu + '"' +
                                    'data-nama="' + row.nama_produk + '"' +
                                    'data-kategori="' + row.category_products.id_kategori_produk + '"' +
                                    'data-satuan="' + row.satuan + '"' +
                                    'data-stok="' + row.stok + '">' +
                                    '<i class="fas fa-pen text-secondary"></i></a>';
                                actions += '<a href="{{ url('/produk/delete-produk') }}/' + row
                                    .id_produk +
                                    '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><span><i class="fas fa-trash text-secondary"></i></span></a>';
                            @endif

                            return actions;
                        }
                    }

                ],

            });
        });
    </script>


    
@endsection
