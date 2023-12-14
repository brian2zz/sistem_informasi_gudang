<?php

namespace App\Http\Controllers;

use App\Models\category_product;
use Illuminate\Http\Request;
use DataTables;

class kategori_produk_controller extends Controller
{
    public function get_kategori(){
        $kategori = category_product::all();
        return DataTables::of($kategori)->make(true);
    }

    public function kategori_produk(){
        $kategori = category_product::all();

        return view('data-master/kategori/kategori-produk',['kategori' => $kategori]);
    }
    public function tambah_kategori_produk(Request $request){
        $id_kategori = category_product::max('id_kategori_produk');
        $id_kategori++;
        category_product::insert([
            'id_kategori_produk' => $id_kategori,
            'nama_kategori_produk' => $request->nama_kategori,
        ]);
        return redirect(url('kategori'));
    }
    public function edit_kategori_produk(Request $request){
        category_product::where('id_kategori_produk',$request->id_kategori_produk)->update([
            'nama_kategori_produk' => $request->nama_kategori,
        ]);
        return redirect(url('kategori'));
    }

    public function delete_kategori_produk($id){
        category_product::where('id_kategori_produk',$id)->delete();
        return redirect(url('kategori'));
    }
}
