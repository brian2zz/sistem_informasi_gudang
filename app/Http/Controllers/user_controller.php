<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class user_controller extends Controller
{
    public function user(){
        $user = User::all();
        return view('data-master.user.user',['user'=>$user]);
    }

    public function tambah_user(Request $request){
        $validatedData = $request->validate([
            'nama_user' => 'required|max:50',
            'email_user' => 'required|email|max:50|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'no_telp' => 'nullable',
            'alamat' => 'nullable',
            'role' => 'required'
        ]);

        $id_user = user::max('id');
        $id_user++;
        user::insert([
            'id' => $id_user,
            'name' => $validatedData['nama_user'],
            'email' => $validatedData['email_user'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['no_telp'],
            'location' => $validatedData['alamat'],
            'role' => $validatedData['role'],
        ]);
        return redirect(url('user'));
    }

    public function edit_user(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'nama_user' => 'required|max:50',
            'email_user' => 'required|email|max:50',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'no_telp' => 'nullable',
            'alamat' => 'nullable',
            'role' => 'required'
        ]);
        user::where('id',$request->id_user)->update([
            'name' => $validatedData['nama_user'],
            'email' => $validatedData['email_user'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['no_telp'],
            'location' => $validatedData['alamat'],
            'role' => $validatedData['role'],
        ]);
        return redirect(url('user'));
    }
    
    public function delete_user($id){
        user::where('id',$id)->delete();
        return redirect(url('user'));
    }
}
