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
                                <h5 class="mb-0">Tambah Permintaan</h5>
                            </div>
                        </div>
                    </div>


                    <div class="card-body mb-4 mx-4 mr-1">
                        <form method="POST" action="{{ url('permintaan-edit/'.$data_request->id.'/action') }}">
                            @csrf
                            <div class="form-row">
                                <input type="text" name="id_permintaan" value="{{ $data_request->id }}" id="#" hidden>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="permintaan_barang">Item Permintaan Barang</label>
                                        <input type="text" class="form-control" value="{{ $data_request->permintaan_barang }}" id="permintaan_barang"
                                            name="permintaan_barang" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" value="{{ $data_request->keterangan }}" id="keterangan" name="keterangan">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="jumlah_permintaan">Jumlah Permintaan</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" value="{{ $satuan_permintaan[0] }}" id="jumlah_permintaan"
                                                    name="jumlah_permintaan">
                                            </div>
                                            <div class="col">
                                                <input type="text" placeholder="satuan" value="{{ $satuan_permintaan[1] }}" class="form-control"
                                                    id="satuan_jumlah_permintaan" name="satuan_jumlah_permintaan">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jumlah_permintaan">Jumlah Realisasi</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" value="{{ $satuan_relasi[0] }}" id="jumlah_relasi"
                                                    name="jumlah_relasi">
                                            </div>
                                            <div class="col">
                                                <input type="text" placeholder="satuan" value="{{ $satuan_relasi[1] }}" class="form-control"
                                                    id="satuan_jumlah_relasi" name="satuan_jumlah_relasi">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="tanggal_permintaan">Tanggal Permintaan</label>
                                            <input type="date" class="form-control" value="{{ $data_request->tanggal_permintaan }}" id="tanggal_permintaan" name="tanggal_permintaan">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="tanggal_relasi">Tanggal Realisasi</label>
                                            <input type="date" class="form-control" value="{{ $data_request->tanggal_relasi }}" id="tanggal_relasi" name="tanggal_relasi">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="toko">Toko</label>
                                            <input type="text" class="form-control" value="{{ $data_request->toko }}" id="toko" name="toko">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="tempat_supplier">Tempat Supplier</label>
                                            <input type="text" class="form-control" value="{{ $data_request->tempat_supplier }}" id="tempat_supplier" name="tempat_supplier">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="harga_satuan">Harga Satuan</label>
                                            <input type="number" class="form-control" value="{{ $data_request->harga_satuan }}" id="harga_satuan" name="harga_satuan">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="harga_total">Harga Total</label>
                                            <input type="number" class="form-control" value="{{ $data_request->harga_total }}" id="harga_total" name="harga_total">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"  onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?')">Edit</button>
                                    <a href="/permintaan" class="btn btn-secondary">
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

    
@endsection
