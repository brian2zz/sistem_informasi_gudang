<div class="modal fade" id="addRecordService" aria-labelledby="addRecordServiceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('sistem-customer/record-service/tambah-record') }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Customer</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="id_pt" id="select_customer" required>
                                <option disabled value="" selected>Pilih customer</option>
                            </select>
                        </div>
                    </div>           
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Contact Person</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="contact_person">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="#" name="tanggal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Running Hours</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="running_hours">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="type">
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
