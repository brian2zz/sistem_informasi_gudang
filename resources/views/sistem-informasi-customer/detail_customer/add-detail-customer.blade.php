<div class="modal fade" id="addCustomer" tabindex="-1" aria-labelledby="addCustomerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/detail-customer/'.$customer->id.'/tambah') }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" id="#" name="id_pt" value="{{ $customer->id }}" hidden>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">ATTN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="attn" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="type" required>
                        </div>
                    </div>
                    <div id="sparepart">
                            <div class="form-group row">
                                <label for="#" class="col-form-label text-black font-w500">Sparepart</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="#" name="sparepart[]" required>
                                </div>
                                <div class="col">
                                    <button class="btn btn-secondary" name="add_item" id="add_item">+</button>
                                </div>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Nota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="nota" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Service</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="service" rows="8" cols="40"></textarea>
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
