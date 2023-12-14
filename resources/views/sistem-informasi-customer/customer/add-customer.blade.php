<div class="modal fade" id="addCustomer" tabindex="-1" aria-labelledby="addCustomerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/sistem-customer/customer/tambah-customer') }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    @if($status == 'admin')
                        <div class="form-group row">
                            <label for="#" class="col-form-label text-black font-w500">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" name="status" id="#" required>
                                    <option disabled value="" selected>Pilih Status</option>
                                        <option data-tokens="algk" value="0">PPN</option>
                                        <option data-tokens="algk" value="1">Non PPN</option>
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Nama PT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="nama_pt" required>
                        </div>
                    </div>                 
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="alamat">
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
