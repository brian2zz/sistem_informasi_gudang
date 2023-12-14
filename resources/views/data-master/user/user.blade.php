@extends('layouts.user_type.auth')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_length select {
            padding-left: 10px;
            /* Sesuaikan ukuran teks yang diinginkan */
            padding-right: 30px;
            /* Sesuaikan ukuran teks yang diinginkan */
        }
    </style>
    <style>
        .password-field {
            position: relative;
        }
        .password-field input[type="password"], .password-field input[type="text"]{
            padding-right: 20px;
            width: 385px; 
        }
        .password-field .toggle-password,.password-field .toggle-password-edit, .password-field .toggle-confirm-password-edit, .password-field .toggle-confirm-password {
            position: absolute;
            top: 50%;
            right: 120px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .hidden {
            display: none;
        }
        #password-mismatch {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
    <div>
        @if ($errors->any())
            <script>
                var error_message = "Terjadi kesalahan dalam pengisian form:\n";
                @foreach ($errors->all() as $error)
                    error_message += "- {{ $error }}\n";
                @endforeach
                alert(error_message);
            </script>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Tabel User</h5>
                            </div>
                            <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal"
                                data-bs-target="#addUser">
                                +&nbsp; Tambah User
                            </button>

                        </div>
                    </div>
                    @include('data-master.user.add-user')
                    @include('data-master.user.edit-user')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="produk" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama User
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email User
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No Telp
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Role
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $User)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $User->name }}</p>
                                            </td>
                                            <td >
                                                <p class="text-xs font-weight-bold mb-0">{{ $User->email }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $User->phone }}</p>
                                            </td>
                                            <td class="ps-sm-4">
                                                <p class="text-xs font-weight-bold mb-0 ">{{ $User->location }}</p>
                                            </td>
                                            <td class="ps-sm-4">
                                                @if($User->role == 'admin')
                                                    <p class="text-xs font-weight-bold mb-0 ">Admin</p>
                                                @elseif($User->role == 'user')
                                                    <p class="text-xs font-weight-bold mb-0 ">User</p> 
                                                @elseif($User->role == 'ppn')
                                                    <p class="text-xs font-weight-bold mb-0 ">Admin PPN</p> 
                                                @elseif($User->role == 'non_ppn')
                                                    <p class="text-xs font-weight-bold mb-0 ">Admin Non PPN</p>
                                                @endif 
                                            </td>
                                            <td>
                                                <a href="#" class="mx-3" data-toggle="modal"
                                                    data-target="#editUser{{ $User->id }}">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <a href="{{ url('/user/delete-user/' . $User->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <span>
                                                        <i class="fas fa-trash text-secondary"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="modal"]').click(function() {
                var target_modal = $(this).data('target');
                $(target_modal).show();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#produk').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<",
                        "next": ">"
                    }
                }
            });
        });
    </script>
    {{-- <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.querySelector(".toggle-password i");
        
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }
        
        function togglePasswordEdit() {
            var passwordField = document.getElementById("password_edit");
            var toggleIcon = document.querySelector(".toggle-password-edit i");
        
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }
        
        function toggleConfirmPassword() {
            var confirmPasswordField = document.getElementById("password_confirmation");
            var toggleIcon = document.querySelector(".toggle-confirm-password i");
        
            if (confirmPasswordField.type === "password") {
                confirmPasswordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                confirmPasswordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;
            if (password.length < 6) {
                alert("Password harus terdiri dari minimal 6 karakter!");
                return false;
            }
            if (password != confirmPassword) {
                alert("Password tidak sama!");
                return false;
            }
            return true;
        }
        </script> --}}
@endsection
