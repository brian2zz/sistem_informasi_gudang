<?php

namespace App\Http\Controllers;

use App\Models\request as ModelsRequest;
use Illuminate\Http\Request;

class permintaan_controller extends Controller
{
    public function permintaan(){
        $data_request = ModelsRequest::all();
        return view('transaksi.permintaan.permintaan',['data_request' => $data_request]);
    }
    public function add_permintaan(){
        return view('transaksi.permintaan.add-permintaan');
    }

    public function edit_permintaan($id){
        $data_request = ModelsRequest::where('id',$id)->first();
        $satuan_permintaan = explode(' ',$data_request->jumlah_permintaan);
        $satuan_relasi = explode(' ',$data_request->jumlah_relasi);
        return view('transaksi.permintaan.edit-permintaan',['data_request' => $data_request,'satuan_permintaan' => $satuan_permintaan,'satuan_relasi' => $satuan_relasi]);
    }
    public function add_permintaan_action(Request $request){
        ModelsRequest::insert([
            'permintaan_barang' => $request->permintaan_barang,
            'keterangan' => $request->keterangan,
            'jumlah_permintaan' => $request->jumlah_permintaan.' '.$request->satuan_jumlah_permintaan,
            'jumlah_relasi' => $request->jumlah_relasi.' '.$request->satuan_jumlah_relasi,
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'tanggal_relasi' => $request->tanggal_relasi,
            'toko'=>$request->toko,
            'tempat_supplier' => $request->tempat_supplier,
            'harga_satuan' => $request->harga_satuan,
            'harga_total' => $request->harga_total,
        ]);

        return redirect('/permintaan');
    }
    public function edit_permintaan_action(Request $request){
        // dd($request);
        ModelsRequest::where('id', $request->id_permintaan)->update([
            'permintaan_barang' => $request->permintaan_barang,
            'keterangan' => $request->keterangan,
            'jumlah_permintaan' => $request->jumlah_permintaan.' '.$request->satuan_jumlah_permintaan,
            'jumlah_relasi' => $request->jumlah_relasi.' '.$request->satuan_jumlah_relasi,
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'tanggal_relasi' => $request->tanggal_relasi,
            'toko'=>$request->toko,
            'tempat_supplier' => $request->tempat_supplier,
            'harga_satuan' => $request->harga_satuan,
            'harga_total' => $request->harga_total,
        ]);
        
        return redirect('/permintaan');
    }

    public function delete_permintaan($id){
        ModelsRequest::where('id', $id)->delete();
        return back();
    }
}
