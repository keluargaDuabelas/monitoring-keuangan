<?php

namespace App\Http\Controllers;

use App\Models\DetailPengajuan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\Kecamatan;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected function calculate($volume, $harga, $ppn)
     {
         $volume = $volume ?: 0;
         $harga = $harga ?: 0;
         $ppn = $ppn ?: 11;

         // Calculate total
         return ($volume * $harga) + (($volume * $harga) * ($ppn / 100));
     }
    public function getTotalJumlah(Request $request)
    {
        $pengajuanId = $request->pengajuan_id;

        // Hitung total dari detail_pengajuan
        $totalJumlah = DetailPengajuan::where('pengajuan_id', $pengajuanId)->sum('jumlah');

        return response()->json(['total' => $totalJumlah]);
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $totalPengajuan = $request->total;
    
        // Pastikan anggaran cukup
        if ($kecamatan && $kecamatan->anggaran && $kecamatan->anggaran->anggaran >= $totalPengajuan) {
            // Simpan pengajuan
            $pengajuan = Pengajuan::create($request->all());
    
            // Kurangi anggaran kecamatan
            $kecamatan->anggaran->update([
                'anggaran' => $kecamatan->anggaran->anggaran - $totalPengajuan,
            ]);
    
            return redirect()->back()->with('success', 'Pengajuan berhasil dibuat dan anggaran dikurangi.');
        } else {
            return redirect()->back()->with('error', 'Anggaran tidak mencukupi.');
        }
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        // Ambil data pengajuan berdasarkan ID
        $pengajuan = Pengajuan::findOrFail($id);

        // Kirim variabel pengajuan ke view
        return view('total.total', compact('pengajuan'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
