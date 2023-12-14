@foreach ($kategori as $Kategori)
    <div class="modal fade" id="editKategoriProduk{{ $Kategori->id_kategori_produk }}" tabindex="-1" aria-labelledby="editKategoriProdukLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/kategori/edit-kategori-produk') }}" method="post">
                    <input type="text" value="{{ $Kategori->id_kategori_produk }}" name="id_kategori_produk" hidden>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Nama Kategori
                                Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="#" value="{{ $Kategori->nama_kategori_produk }}" name="nama_kategori"
                                    placeholder="Nama Kategori" required>
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
@endforeach
