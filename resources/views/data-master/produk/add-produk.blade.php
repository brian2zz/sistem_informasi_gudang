<div class="modal fade" id="addProduk" tabindex="-1" aria-labelledby="addProdukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/produk/tambah-produk') }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Nomor Kartu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="nomor_kartu" placeholder="Nomor Kartu" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="nama_produk" placeholder="Nama Produk" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Kategori Produk</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="kategori_produk" id="#">
                                <option disabled value="" selected>Pilih Kategori</option>
                                @foreach ($kategori as $Kategori)
                                    <option data-tokens="algk" value="{{ $Kategori->id_kategori_produk }}">
                                        {{ $Kategori->nama_kategori_produk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Part Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="nama_satuan" placeholder="Part Number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="#" name="stok" placeholder="Jumlah Stok">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">tambah</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
