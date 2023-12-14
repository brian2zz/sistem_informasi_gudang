@extends('sistem-informasi-customer.layouts.app')

@section('title', 'Record Service Customer')

@section('content-sistem-customer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="../assets/css/cdn-table.css" rel="stylesheet" />
    <style>
        .dataTables_length select {
            padding-left: 10px;
            /* Sesuaikan ukuran teks yang diinginkan */
            padding-right: 30px;
            /* Sesuaikan ukuran teks yang diinginkan */
        }

        .text-warp{
            white-space: nowrap;
            /* Non-wrapping default */
        }

        .text-warp-normal {
            white-space: normal !important;
            /* Word wrap enabled */
        }
    </style>
    <div class="row">
        @if (session('Error'))
            <div class="alert alert-danger" style="color:#fff;">
                <!-- Icon Close Bootstrap -->
                <button type="button" class="btn-close col"data-dismiss="alert" aria-label="Close"></button>
                {{ session('Error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" style="color:#fff;">
                <!-- Icon Close Bootstrap -->
                <button type="button" class="btn-close col"data-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
        @endif
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Record Service</h5>
                        </div>
                        <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal"
                            data-bs-target="#addRecordService">
                            +&nbsp; Tambah
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="importRecord" tabindex="-1" aria-labelledby="importRecordLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Import Record Service</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ url('/sistem-customer/record-service/import') }}" method="post"
                                enctype="multipart/form-data">
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
                                    <button type="submit" class="btn btn-primary">Import</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('sistem-informasi-customer.record_service.add_record_service')
                @include('sistem-informasi-customer.record_service.edit_record_service')
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="tanggal_masuk">Mulai Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggal_masuk">Sampai Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" id="filter" class="btn bg-gradient-primary btn-sm mb-0"
                                    style="margin-top:35px;">Filter</button>
                            </div>
                        </div>
                        <table id="dashboard" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">No</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Nama PT</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Alamat</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Contact Person
                                    </th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Tanggal</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Running Hours
                                    </th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Type</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Service</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder no-export">
                                        action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#select_customer').select2({
                dropdownParent: $('#addRecordService'),
                ajax: {
                    url: "/sistem-customer/get-customers",
                    dataType: 'json',
                    delay: 800,
                    data: function(params) {
                        return {
                            term: params.term
                        }
                    },
                    processResults: function(data, page) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#dashboard').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<",
                        "next": ">"
                    }
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('sistem-customer/record-service') }}",
                    data: function(d) {
                        d.tanggal_awal = $('#tanggal_mulai').val();
                        d.tanggal_akhir = $('#tanggal_akhir').val();
                    }
                },
                autoWidth: true,
                dom: 'Bfrtip',
                buttons: [{
                        text: 'Import', // Label tombol
                        action: function(e, dt, node, config) {
                            // Logika yang akan dijalankan ketika tombol "Import" diklik
                            // Misalnya, tampilkan modal impor atau jalankan tindakan impor
                            $('#importRecord').modal('show'); // Menampilkan modal impor
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Export ke Excel',
                        filename: 'data_sistem_customer', // Ubah nama file sesuai kebutuhan
                        exportOptions: {
                            columns: ':not(.no-export)' // Mengabaikan kolom dengan kelas "no-export"
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print Data',
                        exportOptions: {
                            columns: ':not(.no-export)' // Mengabaikan kolom dengan kelas "no-export"
                        }

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
                        data: null,
                        className: 'text-center text-sm text-warp text-warp-normal',
                        render: function(data, type, full, meta) {
                            // Menambahkan nomor urut
                            return meta.row + 1;
                        },
                    },
                    {
                        data: 'customer',
                        name: 'customer.nama_pt',
                        className: 'text-center text-sm text-warp text-warp-normal',
                        render: function(data) {
                            if (data && data.nama_pt) {
                                return data.nama_pt;
                            } else {
                                return '';
                            }
                        }

                    },
                    {
                        data: 'customer',
                        name: 'customer.alamat',
                        className: 'text-center text-sm text-warp text-warp-normal',
                        render: function(data) {
                            if (data && data.alamat) {
                                return data.alamat;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: 'contact_person',
                        name: 'contact_person',
                        className: 'text-center text-sm text-warp text-warp-normal',

                    },

                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        className: 'text-center text-sm text-warp text-warp-normal',

                    },
                    {
                        data: 'running_hours',
                        name: 'running_hours',
                        className: 'text-center text-sm text-warp text-warp-normal',

                    },
                    {
                        data: 'type',
                        name: 'type',
                        className: 'text-center text-sm',

                    },
                    {
                        data: 'service',
                        name: 'service',
                        className: 'text-left text-sm text-warp text-warp-normal',
                        render: function(data, type, row) {
                            if (data) {
                                data = data.replace(/\r\n/g, ' <br>');
                            }
                            return data;
                        }

                    },
                    {
                        data: null,
                        className: 'text-center text-sm text-warp text-warp-normal',
                        render: function(data, type, row) {
                            // Tambahkan tautan dan ikon tindakan di sini

                            @if (Auth::user()->role != 'user')
                                var actions =
                                    '<a href="#" class="mx-2" data-toggle="modal" data-target="#editRecordService"' +
                                    'data-id="' + row.id + '"' +
                                    'data-idpt="' + row.id_pt + '"' +
                                    'data-contact="' + row.contact_person + '"' +
                                    'data-tanggal="' + row.tanggal + '"' +
                                    'data-runninghours="' + row.running_hours + '"' +
                                    'data-type="' + row.type + '"' +
                                    'data-service="' + row.service + '"' + '">' +
                                    '<i class="fas fa-pen text-secondary"></i></a>';
                                actions +=
                                    '<a href="{{ url('sistem-customer/record-service/delete') }}/' +
                                    row
                                    .id +
                                    '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><span><i class="fas mx-2 fa-trash text-secondary"></i></span></a>';
                            @endif

                            return actions;
                        }
                    }

                ],
            });
            $("#filter").click(function() {
                table.draw();
            });
        });
    </script>

    <script>
        // $(document).ready(function() {
        //     $('[data-toggle="modal"]').click(function() {
        //         var target_modal = $(this).data('target');
        //         $(target_modal).show();
        //     });
        // });
        $('#editRecordService').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var pt = button.data('idpt');
            var contact = button.data('contact');
            var tanggal = button.data('tanggal');
            var runningHours = button.data('runninghours');
            var type = button.data('type');
            var service = button.data('service');

            // Mengisi data ke dalam modal
            $('#editId').val(id);
            $('#editContact').val(contact);
            $('#editTanggal').val(tanggal);
            $('#editRunningHours').val(runningHours);
            $('#editType').val(type);
            $('#editService').val(service);
            $.ajax({
                url: "/sistem-customer/get-customers",
                method: 'GET',
                success: function(data) {
                    // Loop melalui data dan tambahkan pilihan ke dalam select box
                    $.each(data, function(key, value) {
                        var option = '<option value="' + key + '"';
                        if (key == pt) {
                            option += ' selected';
                        }
                        option += '>' + value + '</option>'
                        $('#edit_select_customer').append(option);
                    });
                }
            });

        });
    </script>
@endsection
