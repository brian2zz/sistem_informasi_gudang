<?php

namespace App\Http\Controllers;

use App\Models\incoming_product;
use App\Models\out_product;
use App\Models\request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class laporan_controller extends Controller
{
    public function laporan_masuk(){
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
        }else{
            $produk_masuk = incoming_product::with('supplier')
                                ->with(['products' => function ($query) {
                                    $query->with('category_products');
                                }])
                                ->with('customer')
                                ->where('submit',1)
                                ->get();
        }
        return view('laporan/laporan-masuk/laporan-masuk',['laporan_masuk'=>$produk_masuk]);
    }

    public function laporan_keluar(){
        if(Auth::user()->role == 'ppn'){
            $produk_keluar = out_product::with('customer')
                ->with(['product' => function ($query) {
                    $query->with('category_products');
                }])
                ->with('supplier')
                ->whereHas('customer', function ($query) {
                    $query->where('status', 0);
                })
                // ->with('supplier')
                ->where('submit',1)
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
                ->where('submit',1)
                ->get();
        }else{
            $produk_keluar = out_product::with('customer')
                                ->with(['product' => function ($query) {
                                    $query->with('category_products');
                                }])
                                ->with('supplier')
                                ->where('submit',1)
                                ->get();
        }
        // foreach($produk_keluar as $keluar){
        //     $keluar = $keluar->customer->id_pembeli;}
        // dd($keluar);
        return view('laporan/laporan-keluar/laporan-keluar',['laporan_keluar' =>$produk_keluar]);
    }

    public function laporan_permintaan(){
        $data_request = ModelsRequest::all();

        return view('laporan/laporan-permintaan/laporan-permintaan',['data_request' =>$data_request]);
    }
    
}
