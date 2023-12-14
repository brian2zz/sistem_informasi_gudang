@foreach ($supplier as $Supplier)
    <div class="modal fade" id="editSupplier{{ $Supplier->id_supplier }}" tabindex="-1" aria-labelledby="editSupplierLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/supplier/edit-supplier') }}" method="post">
                    <input type="text" value="{{ $Supplier->id_supplier }}" name="id_supplier" hidden>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Nama Supplier</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="#" value="{{ $Supplier->nama_supplier }}" name="nama_supplier"
                                    placeholder="Nama Supplier" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">No Telp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="#" value="{{ $Supplier->no_telp }}" name="no_telp"
                                    placeholder="No Telp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $Supplier->alamat }}" id="#" name="alamat"
                                    placeholder="Alamat">
                            </div>
                        </div>
                        @if($status == 'admin')
                            <div class="form-group row">
                                <label for="#" class="col-form-label text-black font-w500">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control selectpicker" name="status" id="#">
                                        <option disabled value="" selected>Pilih Status</option>
                                            <option data-tokens="algk"{{ $Supplier->status == 0 ? 'selected' : '' }} value="0">PPN</option>
                                            <option data-tokens="algk" {{ $Supplier->status == 1 ? 'selected' : '' }} value="1">Non PPN</option>
                                    </select>
                                </div>
                            </div>
                        @endif
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
