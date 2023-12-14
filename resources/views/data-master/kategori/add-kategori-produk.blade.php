<div class="modal fade" id="addKategoriProduk" tabindex="-1" aria-labelledby="addKategoriProdukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/kategori/tambah-kategori-produk') }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Nama Kategori Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="nama_kategori" placeholder="Nama Kategori" required>
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
