@foreach ($customer as $Customer)
    <div class="modal fade" id="editCustomer{{ $Customer->id_pembeli }}" tabindex="-1" aria-labelledby="editCustomerLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit customer</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/customer/edit-customer') }}" method="post">
                    <input type="text" value="{{ $Customer->id_pembeli }}" name="id_customer" hidden>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Nama customer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="#" value="{{ $Customer->nama_pembeli }}" name="nama_customer"
                                    placeholder="Nama customer" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">No Telp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="#" value="{{ $Customer->no_telp }}" name="no_telp"
                                    placeholder="No Telp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $Customer->alamat }}" id="#" name="alamat"
                                    placeholder="Alamat">
                            </div>
                        </div>
                        @if($status == 'admin')
                            <div class="form-group row">
                                <label for="#" class="col-form-label text-black font-w500">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control selectpicker" name="status" id="#">
                                        <option disabled value="" selected>Pilih Status</option>
                                            <option data-tokens="algk"{{ $Customer->status == 0 ? 'selected' : '' }} value="0">PPN</option>
                                            <option data-tokens="algk" {{ $Customer->status == 1 ? 'selected' : '' }} value="1">Non PPN</option>
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
