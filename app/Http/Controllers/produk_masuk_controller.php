<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category_product;
use App\Models\customer;
use App\Models\incoming_product;
use App\Models\product;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class produk_masuk_controller extends Controller
{
    public function produk_masuk()
    {

        if (Auth::user()->role == 'ppn') {
            $produk_masuk = incoming_product::with('supplier')
                ->with(['products' => function ($query) {
                    $query->with('category_products');
                }])
                ->whereHas('supplier', function ($query) {
                    $query->where('status', 0);
                })
                ->with('customer')
                ->get();
        } else if (Auth::user()->role == 'non_ppn') {
            $produk_masuk = incoming_product::with('supplier')
                ->with(['products' => function ($query) {
                    $query->with('category_products');
                }])
                ->whereHas('supplier', function ($query) {
                    $query->where('status', 1);
                })
                ->with('customer')
                ->get();
        } else {
            $produk_masuk = incoming_product::with('supplier')
                ->with(['products' => function ($query) {
                    $query->with('category_products');
                }])
                ->with('customer')
                ->get();
        }

        $kategori_produk = category_product::all();

        return view(
            'transaksi/produk-masuk/produk-masuk',
            [
                'produk_masuk' => $produk_masuk,
                'kategori_produk' => $kategori_produk
            ]
        );
    }

    public function add_produk_masuk()
    {
        if (Auth::user()->role == 'ppn') {
            $supplier = supplier::where('status', 0)->get();
            $customer = customer::where('status', 0)->orWhere('status', 2)->get();
        } else if (Auth::user()->role == 'non_ppn') {
            $supplier = supplier::where('status', 1)->get();
            $customer = customer::where('status', 1)->orWhere('status', 2)->get();
        } else {
            $supplier = supplier::where('status', '!=', 2)->get();
            $customer = customer::all();
        }
        $produk = product::all();
        return view('transaksi/produk-masuk/add-produk-masuk', ['customer' => $customer, 'supplier' => $supplier, 'produk' => $produk]);
    }

    public function add_produk_masuk_action(Request $request)
    {
        $id_produk_masuk = incoming_product::max('id_produk_masuk');
        $id_produk_masuk++;
        $incomingProduct = new incoming_product;
        // dd($request);
        incoming_product::create([
            'id_produk_masuk' => $id_produk_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
            'id_supplier' => $request->supplier,
            'id_pembeli' => $request->customer,
            'keterangan' => $request->keterangan,
            'submit' => 0
        ]);
        for ($i = 0; $i < count($request->produk); $i++) {
            $produk = product::where('id_produk', $request->produk[$i])->first();
            $incomingProduct->products()->attach($request->produk[$i], ['id_produk_masuk' => $id_produk_masuk,'jumlah_masuk' => $request->jumlah_masuk[$i]]);
        }
        return redirect('/produk-masuk');
    }

    public function edit_produk_masuk($id)
    {
        $produk_masuk = incoming_product::with('supplier')
            ->with(['products' => function ($query) {
                $query->with('category_products');
            }])->where('id_produk_masuk', $id)->get();
        // dd($produk_masuk);
        if (Auth::user()->role == 'ppn') {
            $supplier = supplier::where('status', 0)->get();
            $customer = customer::where('status', 0)->orWhere('status', 2)->get();
        } else if (Auth::user()->role == 'non_ppn') {
            $supplier = supplier::where('status', 1)->get();
            $customer = customer::where('status', 1)->orWhere('status', 2)->get();
        } else {
            $supplier = supplier::where('status', '!=', 2)->get();
            $customer = customer::all();
        }
        $produk = product::all();
        return view('transaksi/produk-masuk/edit-produk-masuk', ['customer' => $customer, 'supplier' => $supplier, 'produk' => $produk, 'produkMasuk' => $produk_masuk]);
    }

    public function edit_produk_masuk_action(Request $request)
    {
        // dd($request);
        $incomingProduct = new incoming_product;
        $incomingProduct->where('id_produk_masuk', $request->id_produk_masuk)->update([
            'tanggal_masuk' => $request->tanggal_masuk,
            'id_supplier' => $request->supplier,
            'id_pembeli' => $request->customer,
            'keterangan' => $request->keterangan,
            'submit' => 0
        ]);
        DB::table('pivot_incoming_product')->where('id_produk_masuk', $request->id_produk_masuk)->delete();
        for ($i = 0; $i < count($request->produk); $i++) {
            $produk = product::where('id_produk', $request->produk[$i])->first();
            $incomingProduct->products()->attach($request->produk[$i], ['id_produk_masuk' => $request->id_produk_masuk, 'jumlah_masuk' => $request->jumlah_masuk[$i]]);
        }
        return redirect('/produk-masuk');
    }

    public function submit_produk_masuk($id)
    {
        $incomingProduct = new incoming_product;
        $incomingProduct->where('id_produk_masuk', $id)->update([
            'submit' => 1,
        ]);

        $detailIncomingProduk = DB::Table('pivot_incoming_product')->where('id_produk_masuk', $id)->get();
        foreach ($detailIncomingProduk as $data){
            $produk = product::where('id_produk',$data->id_produk)->first();
            DB::table('pivot_incoming_product')
                ->where('id_produk_masuk', $data->id_produk_masuk)
                ->where('id_produk', $produk->id_produk)
                ->update(['sisa_stok_masuk' => $produk->stok + $data->jumlah_masuk]);
        }   

        $incomingProduct->pivot_laporan()->attach($id);
        $produk = $incomingProduct->where('id_produk_masuk', $id)->with('products')->first();
        $i = 0;
        foreach ($produk->products as $data_produk) {
            $jumlah_masuk = $produk->products[$i]->pivot->jumlah_masuk;
            $data_produk->stok = $data_produk->stok + $jumlah_masuk;
            $data_produk->save();
            $i++;
        }
        return redirect('/produk-masuk');
    }

    public function delete_produk_masuk($id)
    {
        $incomingProduct = incoming_product::find($id);
        $incomingProduct->delete();
        DB::table('pivot_incoming_product')->where('id_produk_masuk', $id)->delete();
        return redirect()->back();
    }
}
