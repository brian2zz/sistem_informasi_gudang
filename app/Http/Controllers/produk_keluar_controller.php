<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\out_product;
use App\Models\product;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class produk_keluar_controller extends Controller
{
    public function produk_keluar(){


        if(Auth::user()->role == 'ppn'){
            $produk_keluar = out_product::with('customer')
                ->with(['product' => function ($query) {
                    $query->with('category_products');
                }])
                ->with('supplier')
                ->whereHas('customer', function ($query) {
                    $query->where('status', 0);
                })
                ->with('supplier')
                ->get();

        }else if(Auth::user()->role == 'non_ppn'){
            $produk_keluar = out_product::with('customer')
                ->with(['product' => function ($query) {
                    $query->with('category_products');
                }])
                ->whereHas('customer', function ($query) {
                    $query->where('status', 1);
                })
                ->with('supplier')
                ->get();
        }else{
            $produk_keluar = out_product::with('customer')
                                ->with(['product' => function ($query) {
                                    $query->with('category_products');
                                }])
                                ->with('supplier')
                                ->get();
        }


        // dd($produk_keluar);
        return view('transaksi/produk-keluar/produk-keluar',
            ['produk_keluar'=>$produk_keluar]
        );
    }

    public function add_produk_keluar(){
        if(Auth::user()->role == 'ppn'){
            $customer = customer::where('status',0)->get();
            $supplier = supplier::where('status',0)->orWhere('status',2)->get();
        }else if(Auth::user()->role == 'non_ppn'){
            $customer = customer::where('status',1)->get();
            $supplier = supplier::where('status',1)->orWhere('status',2)->get();
        }else{
            $customer = customer::where('status','!=',2)->get();
            $supplier = supplier::all();
        }
        $produk = product::all();
        return view('transaksi/produk-keluar/add-produk-keluar',['supplier'=>$supplier,'customer'=>$customer,'produk'=>$produk]);
    }

    public function add_produk_keluar_action(Request $request){
        // dd($request->produk[0]);
        $id_produk_keluar = out_product::max('id_produk_keluar');
        $id_produk_keluar++;
        $outProduct = new out_product;
        out_product::create([
            'id_produk_keluar' => $id_produk_keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan'=>$request->keterangan,
            'id_pembeli' => $request->customer,
            'id_supplier'=>$request->supplier,
            'submit' => 0
        ]);
        for($i = 0; $i < count($request->produk); $i++){
            $outProduct->product()->attach($request->produk[$i], ['id_produk_keluar'=>$id_produk_keluar, 'jumlah_keluar' => $request->jumlah_keluar[$i]]);
        }
        return redirect('/produk-keluar');
    }

    public function edit_produk_keluar($id){
        $produk_keluar = out_product::with('customer')
                            ->with(['product' => function ($query) {
                                $query->with('category_products');
                            }])->where('id_produk_keluar',$id)->get();
        if(Auth::user()->role == 'ppn'){
            $customer = customer::where('status',0)->get();
            $supplier = supplier::where('status',0)->orWhere('status',2)->get();
        }else if(Auth::user()->role == 'non_ppn'){
            $customer = customer::where('status',1)->get();
            $supplier = supplier::where('status',1)->orWhere('status',2)->get();
        }else{
            $customer = customer::where('status','!=',2)->get();
            $supplier = supplier::all();
        }
        $produk = product::all();
        return view('transaksi/produk-keluar/edit-produk-keluar',['supplier'=>$supplier,'customer'=>$customer,'produk'=>$produk,'produkKeluar'=>$produk_keluar]);
    }

    public function edit_produk_keluar_action(Request $request){
        // dd($request);
        $outProduct = new out_product;
        $outProduct->where('id_produk_keluar',$request->id_produk_keluar)->update([
            'tanggal_keluar' => $request->tanggal_keluar,
            'id_pembeli' => $request->customer,
            'id_supplier' => $request->supplier,
            'keterangan' => $request->keterangan,
            'submit' => 0
        ]);
        DB::table('pivot_out_product')->where('id_produk_keluar', $request->id_produk_keluar)->delete();
        for($i = 0; $i < count($request->produk); $i++){
            $outProduct->product()->attach($request->produk[$i], ['id_produk_keluar'=>$request->id_produk_keluar,'jumlah_keluar' => $request->jumlah_keluar[$i]]);
        }
        return redirect('/produk-keluar');

    }
    public function submit_produk_keluar($id) {
        $outProduct = new out_product;
        $outProduct->where('id_produk_keluar',$id)->update([
            'submit' => 1
        ]);

        $detailOutProduk = DB::Table('pivot_out_product')->where('id_produk_keluar', $id)->get();
        foreach ($detailOutProduk as $data){
            $produk = product::where('id_produk',$data->id_produk)->first();
            DB::table('pivot_out_product')
                ->where('id_produk_keluar', $data->id_produk_keluar)
                ->where('id_produk', $produk->id_produk)
                ->update(['sisa_stok_keluar' => $produk->stok - $data->jumlah_keluar]);
        }  

        $outProduct->pivot_laporan()->attach($id);
        $produk = $outProduct->where('id_produk_keluar',$id)->with('product')->first();
        $i = 0;
        foreach($produk->product as $data_produk){
            $jumlah_keluar = $produk->product[$i]->pivot->jumlah_keluar;
            $data_produk->stok = $data_produk->stok - $jumlah_keluar;
            $data_produk->save();
            $i++;
        }
        return redirect('/produk-keluar');
    }

    public function delete_produk_keluar($id){
        $outProduct = out_product::find($id);
        $outProduct->delete();
        DB::table('pivot_out_product')->where('id_produk_keluar', $id)->delete();
        return redirect()->back();
    }
}
