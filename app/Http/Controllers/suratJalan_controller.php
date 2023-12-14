<?php

namespace App\Http\Controllers;

use App\Models\surat_jalan;
use App\Models\surat_jalan_detail;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

use Illuminate\Http\Request;
use PDO;

class suratJalan_controller extends Controller
{
    public function surat_jalan(){
        $suratJalan = surat_jalan::with('suratJalanDetails')->get();
        // $jumlah = [];
        // foreach ($suratJalan as $SuratJalan){
        //     foreach ($SuratJalan->suratJalanDetails as $detail) {
        //         $jumlah[] = $detail->namabarang;
        //     }
        // }
        // dd($suratJalan);
        return view('surat-jalan.surat-jalan',['suratJalan' => $suratJalan]);
    }

    public function add_surat_jalan(){
        return view('surat-jalan.add-surat-jalan');
    }

    public function add_surat_jalan_action(Request $request){
        $validatedData = $request->validate([
            'nosurat' => 'required',
            'kota' => 'required',
            'tujuan' => 'required',
            'alamattujuan' => 'required',
            'penerima' => 'required',
            'pengirim' => 'required',
            'mengetahui' => 'required',
            'dibuatoleh' => 'required',
            'namabarang.*' => 'required',
            'jumlah.*' => 'required',
        ]);
        
        $suratJalan = new surat_jalan();
        $suratJalan->nosurat = $validatedData['nosurat'];
        $suratJalan->kota = $validatedData['kota'];
        $suratJalan->tujuan = $validatedData['tujuan'];
        $suratJalan->alamattujuan = $validatedData['alamattujuan'];
        $suratJalan->penerima = $validatedData['penerima'];
        $suratJalan->pengirim = $validatedData['pengirim'];
        $suratJalan->mengetahui = $validatedData['mengetahui'];
        $suratJalan->dibuatoleh = $validatedData['dibuatoleh'];
        $suratJalan->save();

        foreach ($validatedData['namabarang'] as $key => $namabarang) {
            $suratJalanDetail = new surat_jalan_detail();
            $suratJalanDetail->id_surat_jalan = $suratJalan->id_surat_jalan;
            $suratJalanDetail->namabarang = $namabarang;
            $suratJalanDetail->jumlah = $validatedData['jumlah'][$key];
            $suratJalanDetail->save();
        }
        return redirect('/surat-jalan');
    }

    public function store(Request $request)
    {
        // validasi form input
        $validatedData = $request->validate([
            'nosurat' => 'required',
            'kota' => 'required',
            'tujuan' => 'required',
            'alamattujuan' => 'required',
            'penerima' => 'required',
            'pengirim' => 'required',
            'mengetahui' => 'required',
            'dibuatoleh' => 'required',
            'namabarang.*' => 'required',
            'jumlah.*' => 'required',
        ]);

        // simpan data ke database
        $suratJalan = new surat_jalan();
        $suratJalan->nosurat = $validatedData['nosurat'];
        $suratJalan->kota = $validatedData['kota'];
        $suratJalan->tujuan = $validatedData['tujuan'];
        $suratJalan->alamattujuan = $validatedData['alamattujuan'];
        $suratJalan->penerima = $validatedData['penerima'];
        $suratJalan->pengirim = $validatedData['pengirim'];
        $suratJalan->mengetahui = $validatedData['mengetahui'];
        $suratJalan->dibuatoleh = $validatedData['dibuatoleh'];
        $suratJalan->save();

        foreach ($validatedData['namabarang'] as $key => $namabarang) {
            $suratJalanDetail = new surat_jalan_detail();
            $suratJalanDetail->id_surat_jalan = $suratJalan->id;
            $suratJalanDetail->namabarang = $namabarang;
            $suratJalanDetail->jumlah = $validatedData['jumlah'][$key];
            $suratJalanDetail->save();
        }

        // buat dokumen Word baru
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // tambahkan konten ke dokumen Word
        $section->addText('Nomor Surat: '.$suratJalan->nosurat);
        $section->addText('Kota: '.$suratJalan->kota);
        $section->addText('Tujuan: '.$suratJalan->tujuan);
        $section->addText('Penerima: '.$suratJalan->penerima);
        $section->addText('Pengirim: '.$suratJalan->pengirim);
        $section->addText('Mengetahui: '.$suratJalan->mengetahui);
        $section->addText('Dibuat Oleh: '.$suratJalan->dibuatoleh);

        $section->addText('Daftar Barang:');

        $table = $section->addTable();
        $table->addRow();
        $styleCell =
            [
                'borderColor' =>'000000',
                'borderSize' => 6,
            ];
        $table->addCell(500,$styleCell)->addText('Nama Barang');
        $table->addCell(500, $styleCell)->addText('Jumlah');
        foreach ($suratJalan->suratJalanDetails as $detail) {
            $table->addRow();
            $table->addCell(500, $styleCell)->addText($detail->namabarang);
            $table->addCell(500, $styleCell)->addText($detail->jumlah);
        }

        // simpan dokumen Word sebagai file
        $filename = 'produk_keluar_'.$suratJalan->id.'.docx';
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save(public_path('docs/'.$filename));

        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        return response()->download(public_path('docs/'.$filename), $filename, $headers)->deleteFileAfterSend(true);
    }

    public function edit_surat_jalan($id){
        $suratJalan = surat_jalan::with('suratJalanDetails')
            ->where('id_surat_jalan', $id)
            ->get();

        return view('surat-jalan.edit-surat-jalan',['surat' => $suratJalan]);
    }

    public function edit_surat_jalan_action(Request $request){
        $validatedData = $request->validate([
            'id_surat_jalan' => 'required',
            'nosurat' => 'required',
            'kota' => 'required',
            'tujuan' => 'required',
            'alamattujuan' => 'required',
            'penerima' => 'required',
            'pengirim' => 'required',
            'mengetahui' => 'required',
            'dibuatoleh' => 'required',
            'namabarang.*' => 'required',
            'jumlah.*' => 'required',
        ]);
        // dd($validatedData['id_surat_jalan']);
        surat_jalan::where('id_surat_jalan', $validatedData['id_surat_jalan'])
        ->update([
            'nosurat' => $validatedData['nosurat'],
            'kota' => $validatedData['kota'],
            'tujuan' => $validatedData['tujuan'],
            'alamattujuan' => $validatedData['alamattujuan'],
            'penerima' => $validatedData['penerima'],
            'pengirim' => $validatedData['pengirim'],
            'mengetahui' => $validatedData['mengetahui'],
            'dibuatoleh' => $validatedData['dibuatoleh']
        ]);

        surat_jalan_detail::where('id_surat_jalan', $validatedData['id_surat_jalan'])->delete();
        foreach ($validatedData['namabarang'] as $key => $namabarang) {
            $suratJalanDetail = new surat_jalan_detail();
            $suratJalanDetail->id_surat_jalan = $validatedData['id_surat_jalan'];
            $suratJalanDetail->namabarang = $namabarang;
            $suratJalanDetail->jumlah = $validatedData['jumlah'][$key];
            $suratJalanDetail->save();
        }
        return redirect('/surat-jalan');
    }

    public function delete_surat_jalan($id){
        surat_jalan::where('id_surat_jalan', $id)->delete();
        surat_jalan_detail::where('id_surat_jalan', $id)->delete();
        return redirect('/surat-jalan');
    }
}
