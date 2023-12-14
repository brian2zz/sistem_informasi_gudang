<table class="table align-items-center mb-0" hidden="hidden" id="export_tabel_produk">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Kartu</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Part Number</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $Produk)
            <tr>
                <td class="ps-4"><p class="text-xs font-weight-bold mb-0">{{ $Produk->no_kartu }}</p></td>
                <td><p class="text-xs font-weight-bold mb-0">{{ $Produk->nama_produk }}</p></td>
                <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Produk->category_products->nama_kategori_produk }}</p></td>
                <td><p class="text-xs font-weight-bold mb-0">{{ $Produk->satuan }}</p></td>
                <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0">{{ $Produk->stok }}</p></td>
            </tr>
        @endforeach
    </tbody>
</table>
