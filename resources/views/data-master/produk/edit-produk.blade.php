{{-- @foreach($produk as $Produk) --}}
    <div class="modal fade" id="editProduk" tabindex="-1" aria-labelledby="editProdukLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/produk/edit-produk/') }}" method="post">
                    <div class="col-sm-10">
                        <input type="text" id="editIdProduk" name="id_produk" hidden>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Nomor Kartu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="editNoKartuProduk"  name="nomor_kartu" placeholder="Nomor Kartu" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="editNamaProduk"  name="nama_produk" placeholder="Nama Produk" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Kategori Produk</label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" name="kategori_produk" id="editKategoriProduk">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Part Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="editSatuanProduk" name="nama_satuan" placeholder="Nama Satuan" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Stok</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="editStokProduk" name="stok" placeholder="Nama Satuan" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?')">edit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- @endforeach --}}
