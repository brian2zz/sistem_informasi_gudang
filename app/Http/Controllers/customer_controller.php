<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customer_controller extends Controller
{
    public function customer(){
        $status_user = Auth::user()->role;
        if($status_user == 'ppn'){
            $status_customer = 0;
        }else if($status_user == 'non_ppn'){
            $status_customer = 1;
        }
        if($status_user == 'admin' or $status_user == 'user'){
            $customer = customer::all();
        }else {
            $customer = customer::where('status',$status_customer)->orWhere('status',2)->get();
        }

        return view('data-master.customer.customer',['customer'=>$customer,'status'=>$status_user]);
    }
    
    public function tambah_customer(Request $request){
        $id_customer = customer::max('id_pembeli');
        $id_customer++;
        if(Auth::user()->role == 'ppn'){
            $status = 0;
        }else if(Auth::user()->role == 'non_ppn'){
            $status = 1;
        }else{
            $status = $request->status;
        }
        customer::insert([
            'id_pembeli' => $id_customer,
            'nama_pembeli' => $request->nama_customer,
            'alamat' => $request->alamat,
            'no_telp'=> $request->no_telp,
            'status' => $status
        ]);

        return redirect(url('customer'));
    }

    public function edit_customer(Request $request){
        customer::where('id_pembeli', $request->id_customer)->update([
            'nama_pembeli' => $request->nama_customer,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat
        ]);
        return redirect(url('customer'));
    }

    public function delete_customer($id){
        customer::where('id_pembeli', $id)->delete();
        return redirect(url('customer'));
    }  
    
}
