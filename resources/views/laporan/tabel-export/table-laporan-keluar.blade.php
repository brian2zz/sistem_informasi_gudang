<table
    id="export_laporan_keluar"
    hidden="hidden"
    class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Keluar</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Part Number</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asal Barang</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tujuan Barang</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah keluar</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laporan_keluar as $laporan) @foreach ($laporan->product as $Produk )
        <tr>
            <td class="ps-4"><p class="text-xs font-weight-bold mb-0">{{ $laporan->tanggal_keluar }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0">{{ $Produk->nama_produk }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0">{{ $Produk->satuan }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $laporan->supplier->nama_supplier }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0">{{ $laporan->customer->nama_pembeli }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0">{{ $Produk->pivot->jumlah_keluar }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0">{{ $Produk->pivot->sisa_stok_keluar }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0">{{ $laporan->keterangan }}</p></td>
        </tr>
        @endforeach @endforeach
    </tbody>
</table>