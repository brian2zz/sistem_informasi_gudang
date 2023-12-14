@extends('sistem-informasi-customer.layouts.app')

@section('title', 'dashboard')

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
                        
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="tanggal_masuk">Mulai Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggal_masuk">Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" id="filter"
                                        class="btn bg-gradient-primary btn-sm mb-0" style="margin-top:35px;">Filter</button>
                                </div>
                            </div>
                        <table id="dashboard" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">No</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Tanggal</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Nama PT</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Alamat</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Type</th>
                                    <th class="text-uppercase text-center text-secondary font-weight-bolder">Status</th>
                                </tr>
                            </thead>
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
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>

    <!-- Tambahkan skrip DateTimePicker di sini -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
                    url: "{{ url('sistem-customer/dashboard') }}",
                    data: function(d) {
                        d.tanggal_awal = $('#tanggal_mulai').val();
                        d.tanggal_akhir = $('#tanggal_akhir').val();
                    }
                },
                autoWidth: false,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        text: 'Export ke Excel',
                        filename: 'data_sistem_customer', // Ubah nama file sesuai kebutuhan
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
                        data: null,
                        className: 'text-center',
                        render: function(data, type, full, meta) {
                            // Menambahkan nomor urut
                            return meta.row + 1;
                        },
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        className: 'text-center',

                    },
                    {
                        data: 'detail_customer',
                        name: 'detail_customer.nama_pt',
                        className: 'text-center',
                        render: function(data) {
                            if (data && data.nama_pt) {
                                return data.nama_pt;
                            } else {
                                return '';
                            }
                        }

                    },
                    {
                        data: 'detail_customer',
                        name: 'detail_customer.alamat',
                        className: 'text-center',
                        render: function(data) {
                            if (data && data.alamat) {
                                return data.alamat;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: 'type',
                        name: 'type',
                        className: 'text-center',

                    },
                    {
                        data: 'detail_customer',
                        name: 'detail_customer.status',
                        className: 'text-center',
                        render: function(data) {
                            if (data && data.alamat) {
                                if (data.status === 0) {
                                    return 'PPN';
                                } else {
                                    return 'Non PPN';
                                }
                            } else {
                                return '';
                            }

                        },
                    }

                ],
            });
            $("#filter").click(function() {
                table.draw();
            });
        });
    </script>
@endsection
