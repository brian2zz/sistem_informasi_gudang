<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\out_product;
use App\Models\product;
use App\Models\supplier;
use App\Models\customer;
use App\Models\incoming_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
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

        return view('dashboard',['data'=>$data,'produk_keluar'=>$produk_keluar,'produk_masuk'=>$produk_masuk]);
    }

}
