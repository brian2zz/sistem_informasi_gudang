<table
    id="export_laporan_permintaan"
    hidden="hidden"
    class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item Permintaan Barang</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Permintaan</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Relasi</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Permintaan</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Realisasi</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Toko</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Total</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tempat Supplier</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_request as $Data)
        <tr>
            <td class="ps-4"><p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p></td>
            <td class="ps-4"><p class="text-xs font-weight-bold mb-0">{{ $Data->permintaan_barang }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->jumlah_permintaan }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->jumlah_relasi }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->tanggal_permintaan }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->tanggal_relasi }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->toko }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->harga_satuan }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->harga_total }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->keterangan }}</p></td>
            <td class="ps-sm-4"><p class="text-xs font-weight-bold mb-0 ">{{ $Data->tempat_supplier }}</p></td>
        </tr>
        @endforeach
    </tbody>
</table>
