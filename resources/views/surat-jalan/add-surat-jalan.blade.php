@extends('layouts.user_type.auth')

@section('content')
    
    
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4 ">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Form Surat Jalan</h5>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="card-body mb-4 mx-4 mr-1">
                        <form method="POST" action="{{ URL('surat-jalan/tambah/action') }}">
                            @csrf
                            <div class="form-row">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="nosurat">Nomor Surat</label>
                                        <input type="text" class="form-control" id="nosurat" name="nosurat" required>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="form-group col-md-3">
                                        <label for="kota">Kota dan Tanggal</label>
                                        <input type="text" class="form-control" id="kota" name="kota" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="tujuan">Tujuan</label>
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="form-group col-md-3">
                                        <label for="alamattujuan">Alamat Tujuan</label>
                                        <input type="text" class="form-control" id="alamattujuan" name="alamattujuan" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="penerima">Penerima</label>
                                        <input type="text" class="form-control" id="penerima" name="penerima" required>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="form-group col-md-3">
                                        <label for="pengirim">Pengirim</label>
                                        <input type="text" class="form-control" id="pengirim" name="pengirim" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="mengetahui">Mengetahui</label>
                                        <input type="text" class="form-control" id="mengetahui" name="mengetahui" required>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="form-group col-md-3">
                                        <label for="dibuatoleh">Dibuat Oleh</label>
                                        <input type="text" class="form-control" id="dibuatoleh" name="dibuatoleh" required>
                                    </div>
                                </div>
                            </div>
                            <div id=user_table>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="namabarang">Nama Barang / Jasa</label>
                                        <input type="text" class="form-control" id="namabarang" name="namabarang[]" required>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="form-group col-md-3">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah[]" required>
                                    </div>
                                    <div class="form-group col mt-4 pt-1">
                                        <button class="btn btn-secondary"
                                        name="add_table" id="add_table">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-2">
                                    <button type="submit" class="btn btn-primary">Buat Surat Jalan</button>
                                </div>
                                <div class="form-group col-2">
                                    <a href="/surat-jalan" class="btn btn-secondary">
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

    
    <script>
        $(document).ready(function() {
        var i = 1;
        $('#add_table').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            
                i++;
                
                $('#user_table').append('<div class="row" id="row_user_table' + i +'">'+
                        '<div class="form-group col-md-3">'+
                                '<label for="namabarang">Nama Barang / Jasa</label>'+
                               ' <input type="text" class="form-control" id="namabarang" name="namabarang[]" required>'+
                            '</div>'+
                            '&nbsp;'+
                            '&nbsp;'+
                            '<div class="form-group col-md-3">'+
                                '<label for="jumlah_masuk">Jumlah Keluar</label>'+
                                '<input type="number" class="form-control" id="jumlah_keluar" name="jumlah[]" required>'+
                            '</div>'+
                            '<div class="form-group col mt-4 pt-1">'+
                                '<button class="btn btn-secondary btn_remove"name="remove" id="'+i+'">-</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>');
                $('#produk'+i).select2();
                console.log(i);
            
               
        });
        $(document).on('click', '.btn_remove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var button_id = $(this).attr("id");
            $('#row_user_table' + button_id + '').remove();
        });
    });
    </script>
@endsection
