<?php

namespace App\Http\Controllers;

use App\Models\incoming_product;
use App\Models\request as ModelsRequest;
use App\Models\out_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class filter_controller extends Controller
{
    public function filter_laporan_masuk(Request $request){
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
                ->whereBetween('tanggal_masuk', [$request->tanggal_mulai, $request->tanggal_akhir])
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
                ->whereBetween('tanggal_masuk', [$request->tanggal_mulai, $request->tanggal_akhir])
                ->get();
        }else{
            $produk_masuk = incoming_product::with('supplier')
                                ->with(['products' => function ($query) {
                                    $query->with('category_products');
                                }])
                                ->with('customer')
                                ->where('submit',1)
                                ->whereBetween('tanggal_masuk', [$request->tanggal_mulai, $request->tanggal_akhir])
                                ->get();
        }
        
        return view('laporan/laporan-masuk/laporan-masuk',['laporan_masuk'=>$produk_masuk]);
    }
    public function filter_laporan_keluar(Request $request){
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
                ->whereBetween('tanggal_keluar', [$request->tanggal_mulai, $request->tanggal_akhir])
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
                ->whereBetween('tanggal_keluar', [$request->tanggal_mulai, $request->tanggal_akhir])
                ->get();
        }else{
            $produk_keluar = out_product::with('customer')
                                ->with(['product' => function ($query) {
                                    $query->with('category_products');
                                }])
                                ->with('supplier')
                                ->whereBetween('tanggal_keluar', [$request->tanggal_mulai, $request->tanggal_akhir])
                                ->get();
        }
        
    
        // dd($produk_keluar);
        return view('laporan/laporan-keluar/laporan-keluar',['laporan_keluar' =>$produk_keluar]);
    }

    public function filter_laporan_permintaan(Request $request){
        $permintaan = ModelsRequest::whereBetween('tanggal_permintaan', [$request->tanggal_mulai, $request->tanggal_akhir])
                                ->get();
        return view('laporan/laporan-permintaan/laporan-permintaan',['data_request' =>$permintaan]);
    }
}
