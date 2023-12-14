<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form {{-- onsubmit="returnvalidateForm()" --}} action="{{ url('/user/tambah-user') }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Nama User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="nama_user" placeholder="Nama User" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Email User</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="#" name="email_user" placeholder="Email User" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">No Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="no_telp" placeholder="No Telp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="alamat" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="role" id="#">
                                <option disabled value="" selected>Pilih Role</option>
                                    <option data-tokens="algk" value="admin">Admin</option>
                                    <option data-tokens="algk" value="ppn">Admin PPN</option>
                                    <option data-tokens="algk" value="non_ppn">Admin Non PPN</option>
                                    <option data-tokens="algk" value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Password</label>
                        <div class="password-field">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                            {{-- <span class="toggle-password" onclick="togglePassword()">
                                <i class="fas fa-eye-slash"></i>
                            </span> --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Confirm Password</label>
                        <div class="password-field">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" required>
                            {{-- <span class="toggle-confirm-password" onclick="toggleConfirmPassword()">
                                <i class="fas fa-eye-slash"></i>
                            </span> --}}
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
