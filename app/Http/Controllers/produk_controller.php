<?php

namespace App\Http\Controllers;

use App\Models\category_product;
use App\Models\incoming_product;
use App\Models\out_product;
use App\Models\product;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class produk_controller extends Controller
{
    public function produk(){
        $kategori = category_product::all();
        return view('data-master/produk/produk', [
            // 'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function get_produk(){
        $produk = product::with(['category_products' => function ($query) {
            $query->orderBy('nama_kategori_produk');
        }])->with('incomingProducts')->with('outProducts')->get();
        return DataTables::of($produk)->make(true);
    }

    public function detail_produk($id){
        $produk = product::with(['category_products' => function ($query) {
            $query->orderBy('nama_kategori_produk');
        }])->with('incomingProducts')->with('outProducts')->where('id_produk',$id)->first();

        // dd($produk);

        $data = DB::table('pivot_laporan')->get();

        if(Auth::user()->role == 'ppn'){
            $produk_masuk = incoming_product::with('supplier')
                ->with(['products' => function ($query) {
                    $query->with('category_products');
                }])
                ->whereHas('supplier', function ($query) {
                    $query->where('status', 0);
                })
                ->with('customer')
                ->where('submit',1)
                ->get();
            
            $produk_keluar = out_product::with('customer')
                ->with(['product' => function ($query) {
                    $query->with('category_products');
                }])
                ->with('supplier')
                ->whereHas('customer', function ($query) {
                    $query->where('status', 0);
                })
                ->with('supplier')
                ->where('submit',1)
                ->get();

        }else if(Auth::user()->role == 'non_ppn'){
            $produk_masuk = incoming_product::with('supplier')
                ->with(['products' => function ($query) {
                    $query->with('category_products');
                }])
                ->whereHas('supplier', function ($query) {
                    $query->where('status', 1);
                })
                ->with('customer')
                ->where('submit',1)
                ->get();

            $produk_keluar = out_product::with('customer')
                ->with(['product' => function ($query) {
                    $query->with('category_products');
                }])
                ->whereHas('customer', function ($query) {
                    $query->where('status', 1);
                })
                ->with('supplier')
                ->where('submit',1)
                ->get();
        }else{
            $produk_masuk = incoming_product::with('supplier')
                ->with(['products' => function ($query) {
                    $query->with('category_products');
                }])
                ->with('customer')
                ->where('submit',1)
                ->get();

            $produk_keluar = out_product::with('customer')
                ->with(['product' => function ($query) {
                    $query->with('category_products');
                }])
                ->with('supplier')
                ->where('submit',1)
                ->get();
        }
        // dd($produk_masuk);
        return view('data-master/produk/detail-produk',['Produk'=>$produk,'data'=>$data,'produk_keluar'=>$produk_keluar,'produk_masuk'=>$produk_masuk]);
    }

    public function tambah_produk(Request $request){
        if(!isset($request->stok)){
            $request->stok = 0;
        };
        $id_produk = product::max('id_produk');
        $id_produk++;
        product::insert([
            'id_produk' => $id_produk,
            'no_kartu'=>$request->nomor_kartu,
            'nama_produk'=>$request->nama_produk,
            'id_kategori_produk'=>$request->kategori_produk,
            'satuan'=>$request->nama_satuan,
            'stok' => $request->stok
        ]);
        return redirect( url('produk'));
        
    }
    
    public function edit_produk(Request $request){
        // dd($request);
        product::where('id_produk',$request->id_produk)->update([
            'no_kartu'=>$request->nomor_kartu,
            'nama_produk'=>$request->nama_produk,
            'id_kategori_produk'=>$request->kategori_produk,
            'satuan'=>$request->nama_satuan,
            'stok'=>$request->stok,
        ]);
        return redirect( url('produk'));
        
    }
    public function delete_produk($id){
        
        product::where('id_produk',$id)->delete();
        return redirect( url('produk'));
        
    }

    public function importExcel(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
                'file' => 'required|mimes:xls,xlsx'
            ]);
            
            // Menggunakan package Laravel Excel untuk membaca file
        $file = $request->file('file');
        $data = Excel::toArray([], $file);
        // Proses data dari file Excel
        $data = array_slice($data[0], 1);
        // dd($data);
        if (!empty($data)) {
            foreach ($data as $row) {
                $id_kategori = category_product::where('nama_kategori_produk','like','%'.$row['2'].'%')->first();
            try{
                    product::create([
                        'no_kartu' => $row[0], // Ganti 'field1' dengan nama kolom tabel yang sesuai
                        'nama_produk' => $row[1], // Ganti 'field2' dengan nama kolom tabel yang sesuai
                        'id_kategori_produk' => $id_kategori->id_kategori_produk, // Ganti 'field2' dengan nama kolom tabel yang sesuai
                        'satuan' => $row[3], // Ganti 'field2' dengan nama kolom tabel yang sesuai
                        'stok' => $row[4], // Ganti 'field2' dengan nama kolom tabel yang sesuai
                        // Lanjutkan sampai seluruh kolom sesuai
                    ]);
            }catch (\Exception $e) {
                    // Catch the exception and return the error view
                    if(!empty($row[0]) or !empty($row[1]) or !empty($row[2]) or !empty($row[3]) or !empty($row[4]))
                    return redirect()->back()->with('Error', 'Data Gagal diimpor!');
            }
        }

        // Redirect atau tampilkan pesan berhasil
        }
    return redirect()->back()->with('success', 'Data berhasil diimpor!');
    }
}