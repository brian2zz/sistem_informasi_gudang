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

        .underline-text {
            text-decoration: underline;
            text-decoration-style: solid;
        }
        .table td {
            padding: 3px; /* Atur ukuran padding yang diinginkan */
        }
        table.table thead th {
            padding: 3px; /* Atur ukuran padding yang diinginkan */
        }
        #surat {
            border-collapse: collapse;
        }   

        @media print {
            .print-button {
                display: none;
            }
            @page {
                size: 8.27in 5.51in;
            }
            .modal-lg {
                max-width: 100% !important;
               
            }
            .modal-content {
                border: none;
                margin-top:-20px;
                
            }
            .modal{
                overflow: hidden !important;
            }

        }
    </style>
    <div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Surat Jalan</h5>
                            </div>
                            <a href="{{ url('surat-jalan/tambah') }}" type="button"
                                class="btn bg-gradient-primary btn-sm mb-0">
                                +&nbsp; Tambah Surat
                            </a>

                        </div>
                    </div>
                    @foreach ($suratJalan as $surat)
                        <div class="modal fade" id="suratJalan{{ $loop->iteration }}" tabindex="-1" role="dialog"
                            aria-labelledby="suratJalanLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="d-flex justify-content-center">
                                                <h6>
                                                    <strong class="underline-text">SURAT JALAN</strong>
                                                </h6>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <p style="font-size: 12px;">No. : {{ $surat->nosurat }}</p>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-2">
                                                    <h6><strong>"LOGO"</strong></h6>
                                                </div>
                                                <div class="col-4">
                                                    <p style="font-size: 10px;" class="my-0">{{ $surat->kota }}</p>
                                                    <p style="font-size: 10px;"class="my-0">Kepada Yth :</p>
                                                    <strong style="font-size: 10px;"
                                                        class="my-1">{{ $surat->tujuan }}</strong>
                                                    <p style="font-size: 10px;" class="my-0">{{ $surat->alamattujuan }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <p style="font-size: 10px;">Mohon di terima dengan baik barang
                                                    berikut</p>
                                            </div>
                                            <div class="table-responsive"  >
                                                <table id="surat" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="font-size: 10px;"
                                                                class="text-uppercase text-secondary ps-2 font-weight-bolder">
                                                                Banyaknya
                                                            </th>
                                                            <th style="font-size: 10px;"
                                                                class="text-uppercase text-secondary ps-2 font-weight-bolder">
                                                                Nama Barang / Jasa
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($surat->suratJalanDetails as $detail)
                                                            <tr>
                                                                <td class="ps-2">
                                                                    <p style="font-size: 10px;" class="text-xs font-weight-bold mb-0">
                                                                        {{ $detail->jumlah }}</p>
                                                                </td>
                                                                <td class="ps-2">
                                                                    <p style="font-size: 10px;" class="text-xs font-weight-bold mb-0">
                                                                        {{ $detail->namabarang }}</p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        @if ($surat->suratJalanDetails->count() < 6)
                                                            @for ($i = 0; $i < 6 - $surat->suratJalanDetails->count(); $i++)
                                                                <tr>
                                                                    <td class="ps-2">
                                                                        <p class="text-xs font-weight-bold mb-0">
                                                                            &nbsp;
                                                                        </p>
                                                                    </td>
                                                                    <td class="ps-2">
                                                                        <p class="text-xs font-weight-bold mb-0">
                                                                            &nbsp;
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            @endfor
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row" style="padding-top: 0; margin-top:-10px; ">
                                                <div class="col-3 text-center mb-2" style="font-size: 12px;">Penerima</div>
                                                <div class="col-3 text-center mb-2" style="font-size: 12px;">Pengirim</div>
                                                <div class="col-3 text-center mb-2" style="font-size: 12px;">Mengetahui</div>
                                                <div class="col-3 text-center mb-2" style="font-size: 12px;">Dibuat Oleh</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 text-center mt-5" style="font-size: 12px;">{{ $surat->penerima }}</div>
                                                <div class="col-3 text-center mt-5" style="font-size: 12px;">{{ $surat->pengirim }}</div>
                                                <div class="col-3 text-center mt-5" style="font-size: 12px;">{{ $surat->mengetahui }}</div>
                                                <div class="col-3 text-center mt-5" style="font-size: 12px;">{{ $surat->dibuatoleh }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary print-button" onclick="printModal()">Print</button>
                                        <button type="button" class="btn btn-secondary print-button" data-bs-dismiss="modal">Batal</button>
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
                                            No
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nomor Surat Jalan
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tujuan
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Penerima
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Dibuat Oleh
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suratJalan as $surat)
                                        <tr>
                                            <td >
                                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $surat->nosurat }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ">{{ $surat->tujuan }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $surat->penerima }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $surat->dibuatoleh }}</p>
                                            </td>
                                            <td>
                                                <a href="#" class="mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#suratJalan{{ $loop->iteration }}">
                                                    <i class="fas fa-table-list text-secondary"></i>
                                                </a>
                                                <a href="{{ url('surat-jalan-edit/'.$surat->id_surat_jalan) }}" class="mx-3" >
                                                    <i class="fas fa-pen text-secondary"></i>
                                                </a>
                                                <a href="{{ url('surat-jalan-delete/'.$surat->id_surat_jalan) }}">
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
        function printModal() {
            window.print();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="modal"]').click(function() {
                var target_modal = $(this).data('target');
                $(target_modal).show();
            });
        });
    </script>
    
@endsection
