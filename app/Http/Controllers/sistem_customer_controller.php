<?php

namespace App\Http\Controllers;

use App\Models\pivot_sistem_customer_detail;
use App\Models\request as ModelsRequest;
use App\Models\sistem_customer;
use App\Models\sistem_customer_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class sistem_customer_controller extends Controller
{
    public function dashboard_sistem_customer(Request $request) {
        if($request->ajax()){
            $customer = sistem_customer_detail::withRelations()->get();

            if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
                $customer = $customer->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
            }
            
            return DataTables::of($customer)->make(true);
        }

        // dd($request->ajax());
        return view('sistem-informasi-customer.dashboard-customer');
    }

    public function get_dashboard_items() {
        
    }

    public function customer_sistem_customer() {
        $customer = sistem_customer::all();
        $status = Auth::user()->role;
        // dd($customer);
        return view('sistem-informasi-customer.customer.customer',['customer'=>$customer,'status'=>$status]);
    }
    
    public function detail_customer_sistem_customer($id) {
        // dd(pivot_sistem_customer_detail::all());
        $customer = sistem_customer::where('id',$id)
        ->with(['detail_customer' => function ($query) {
            $query->with('pivot_detail');
        }])->first();
        // dd($customer);
        return view('sistem-informasi-customer.detail_customer.detail-customer',['customer'=>$customer]);
    }
    public function add_customer_sistem_customer(request $request) {
        sistem_customer::insert([
            'nama_pt' => $request->nama_pt,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);
        return redirect('/sistem-customer/customer');
    }
    public function edit_customer_sistem_customer(request $request) {
        sistem_customer::where('id',$request->id)->update([
            'nama_pt' => $request->nama_pt,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);
        return redirect('/sistem-customer/customer');
    }
    public function delete_customer_sistem_customer($id) {
        sistem_customer::where('id',$id)->delete();
        $customer_detail = sistem_customer_detail::where('id_pt',$id)->get();
        foreach($customer_detail as $detail){
            DB::table('pivot_sistem_customer_details')->where('id_sistem_customer_details',$detail->id)->delete();
        }
        sistem_customer_detail::where('id_pt',$id)->delete();
        return redirect('/sistem-customer/customer');
    }

    public function add_detail_customer_sistem_customer(request $request) {
        $id_sistem_customer_detail = sistem_customer_detail::max('id');
        $id_sistem_customer_detail++;
        sistem_customer_detail::insert([
            'id' => $id_sistem_customer_detail,
            'id_pt' => $request->id_pt,
            'attn' => $request->attn,
            'tanggal' => $request->tanggal,
            'type' => $request->type,
            'nota' => $request->nota,
            'service' => $request->service,
        ]);

        for($i=0;$i< count($request->sparepart);$i++){
            DB::table('pivot_sistem_customer_details')->insert([
                'id_sistem_customer_details'=>$id_sistem_customer_detail,
                'sparepart'=>$request->sparepart[$i],
                ]);
        }

        return back();
    }
    public function edit_detail_customer_sistem_customer(request $request) {
        // dd($request);
        sistem_customer_detail::where('id',$request->id_detail)->update([
            'attn' => $request->attn,
            'tanggal' => $request->tanggal,
            'type' => $request->type,
            'nota' => $request->nota,
            'service' => $request->service,
        ]);

        pivot_sistem_customer_detail::where('id_sistem_customer_details',$request->id_detail)->delete();
        for($i=0;$i< count($request->sparepart);$i++){
            DB::table('pivot_sistem_customer_details')->insert([
                'id_sistem_customer_details'=>$request->id_detail,
                'sparepart'=>$request->sparepart[$i],
                ]);
        }
        return back();
    }
    public function delete_detail_customer_sistem_customer($id) {
        sistem_customer_detail::where('id',$id)->delete();
        DB::table('pivot_sistem_customer_details')->where('id_sistem_customer_details',$id)->delete();
        return back();
    }
}
