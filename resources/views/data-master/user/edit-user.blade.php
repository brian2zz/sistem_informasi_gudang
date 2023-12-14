@foreach ($user as $User)
    
<div class="modal fade" id="editUser{{ $User->id }}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/user/edit-user') }}" method="post">
                <input type="text" class="form-control" id="#" value="{{ $User->id }}" name="id_user" placeholder="Nama User" hidden>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Nama User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" value="{{ $User->name }}" name="nama_user" placeholder="Nama User" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Email User</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="#" value="{{ $User->email }}" name="email_user" placeholder="Email User" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">No Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" value="{{ $User->phone }}" name="no_telp" placeholder="No Telp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" value="{{ $User->location }}" name="alamat" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="role" id="#">
                                <option disabled value="" selected>Pilih Role</option>
                                <option data-tokens="algk" {{ $User->role == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                <option data-tokens="algk" {{ $User->role == 'ppn' ? 'selected' : '' }} value="ppn">Admin PPN</option>
                                <option data-tokens="algk" {{ $User->role == 'non_ppn' ? 'selected' : '' }} value="non_ppn">Admin Non PPN</option>
                                <option data-tokens="algk" {{ $User->role == 'user' ? 'selected' : '' }} value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Password</label>
                        <div class="password-field">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password_edit" required>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-form-label text-black font-w500">Confirm Password</label>
                        <div class="password-field">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation_edit" required>
                            
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
