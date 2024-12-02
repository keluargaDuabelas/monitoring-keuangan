<?php

namespace App\Http\Controllers;

use App\Models\DetailPengajuan;
use Illuminate\Http\Request;

class DetailPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getTotalJumlah()
    {
        // Misalnya menghitung total dari kolom 'jumlah' di tabel orders
        $totalJumlah = DetailPengajuan::sum('jumlah');

        return response()->json(['total' => $totalJumlah]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailPengajuan $detailPengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailPengajuan $detailPengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailPengajuan $detailPengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPengajuan $detailPengajuan)
    {
        //
    }
}
