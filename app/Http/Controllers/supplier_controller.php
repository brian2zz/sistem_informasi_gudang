<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class supplier_controller extends Controller
{
    public function supplier(){
        $status_user = Auth::user()->role;
        if($status_user == 'ppn'){
            $status_supplier = 0;
        }else if($status_user == 'non_ppn'){
            $status_supplier = 1;
        }
        if($status_user == 'admin' or $status_user == 'user'){
            $supplier = supplier::all();
        }else {
            $supplier = supplier::where('status',$status_supplier)->orWhere('status',2)->get();
        }
        return view('data-master.supplier.supplier',['status'=>$status_user,'supplier'=>$supplier]);
    }

    public function tambah_supplier(Request $request){
        $id_supplier = supplier::max('id_supplier');
        $id_supplier++;
        if(Auth::user()->role == 'ppn'){
            $status = 0;
        }else if(Auth::user()->role == 'non_ppn'){
            $status = 1;
        }else{
            $status = $request->status;
        }
        supplier::insert([
            'id_supplier' => $id_supplier,
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'no_telp'=> $request->no_telp,
            'status' => $status
        ]);

        return redirect(url('supplier'));
    }

    public function edit_supplier(Request $request){
        supplier::where('id_supplier', $request->id_supplier)->update([
            'nama_supplier' => $request->nama_supplier,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat
        ]);
        return redirect(url('supplier'));
    }

    public function delete_supplier($id){
        supplier::where('id_supplier', $id)->delete();
        return redirect(url('supplier'));
    }
}
