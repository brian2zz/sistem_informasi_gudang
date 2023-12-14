<?php

namespace App\Http\Controllers;

use App\Models\record_service_customer;
use App\Models\request as ModelsRequest;
use App\Models\sistem_customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

class RecordServiceCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $status = Auth::user()->role;
        $customer = sistem_customer::orderBy('nama_pt', 'asc')->get();
        // dd($data_record);
        if ($request->ajax()) {
            
            $data_record = record_service_customer::withRelations()->get();
            if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
                $data_record = $data_record->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
            }

            return DataTables::of($data_record)->make(true);
        }


        return view('sistem-informasi-customer.record_service.record_service', ['status' => $status,'customer'=>$customer]);
    }

    public function get_index()
    {
        $data_record = record_service_customer::withRelations()->get();
        return DataTables::of($data_record)->make(true);
    }

    public function get_customers(Request $request)
    {
        $term = $request->input('term');
        $customer = sistem_customer::where('nama_pt', 'like', '%' . $term . '%')->orderBy('nama_pt', 'asc')->get();
        $list = [];
        foreach ($customer as $index => $c) {
            $list[$index]['id'] = $c->id;
            $list[$index]['text'] = $c->nama_pt;
        }
        // dd($list);
        return response()->json($list);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $id_record = record_service_customer::max('id');
        $id_record++;
        $store_record = record_service_customer::insert([
            'id' => $id_record,
            'id_pt' => $request->id_pt,
            'contact_person' => $request->contact_person,
            'tanggal' => $request->tanggal,
            'running_hours' => $request->running_hours,
            'type' => $request->type,
            'service' => $request->service
        ]);
        return redirect('/sistem-customer/record-service');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, record_service_customer $record_service_customer)
    {
        $record_service_customer->where('id', $request->id_record)->update([
            'id_pt' => $request->id_pt,
            'contact_person' => $request->contact_person,
            'tanggal' => $request->tanggal,
            'running_hours' => $request->running_hours,
            'type' => $request->type,
            'service' => $request->service,
        ]);
        return redirect('/sistem-customer/record-service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, record_service_customer $record_service_customer)
    {
        $record_service_customer->where('id', $id)->delete();
        return redirect('/sistem-customer/record-service');
    }

    public function import(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('file');
        // dd($file);
        $data = Excel::toArray([], $file);
        // Proses data dari file Excel
        $data = array_slice($data[0], 3);

        $pt = [];
        $contact = [];
        $tanggal = [];
        $running_hours = [];
        $type = [];
        $service = [];
        $i = 0;
        foreach ($data as $index => $row) {
            // $service[$index] = $row[0]; 
            if (isset($row[0])) {
                if ($index != 0) {
                    $i++;
                }
                $pt[$i] = sistem_customer::where('nama_pt', 'like', '%' . $row[1] . '%')->pluck('id')->first();
                if (isset($pt[$i])) {
                    $contact[$i] = $row[2];

                    if(is_int($row[3])){
                        $carbon_date = Carbon::createFromTimestamp((intval($row[3]) - 25569) * 86400);
                        $tanggal[$i] = $carbon_date->format('Y-m-d');
                        $running_hours[$i] = $row[4];
                        $type[$i] = $row[5];
                        $service[$i] = $row[6];
                    }else{
                        return redirect()->back()->with('Error', 'Data Gagal di import ! Format tanggal tidak dd/mm/yyyy');
                    }

                } else {
                    return redirect()->back()->with('Error', 'Data Gagal di import ! Nama customer ' . $row[1] . ' tidak tersedia');
                }
            } else {
                if (!isset($row[6])) {
                    $service[$i] = $service[$i] . "\r\n";
                } else {
                    $service[$i] = $service[$i] . "\r\n" . $row[6];
                }
            }
        }
        // dd($pt);
        foreach ($pt as $index => $value) {
            try {
                $id_record = record_service_customer::max('id');
                $id_record++;
                record_service_customer::insert([
                    'id' => $id_record,
                    'id_pt' => $value,
                    'contact_person' => $contact[$index],
                    'tanggal' => $tanggal[$index],
                    'running_hours' => $running_hours[$index],
                    'type' => $type[$index],
                    'service' => $service[$index],
                ]);
            } catch (\Exception $e) {
                    return redirect()->back()->with('Error', 'Data Gagal diimpor!');
            }
        }

        return redirect()->back()->with('success', 'Data berhasil diimpor!');
    }
}
