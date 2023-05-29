<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratKeluarRequest;
use App\Http\Requests\UpdateSuratKeluarRequest;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('suratkeluar/surat_out')->with([
            'suratkeluar' => SuratKeluar::paginate(10)
         ]);
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
    public function store(StoreSuratKeluarRequest $request)
    {
        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('surat_keluar'),$data_nama);

        $surat = new SuratKeluar;
        $surat->no_surat = $request->txtnosurat;
        $surat->tgl_surat = $request->tglsurat;
        $surat->kepada = $request->txtkepada;
        $surat->perihal = $request->txtperihal;
        $surat->file_surat = $data_nama;
        $surat->keterangan = $request->txtketerangan;
        $surat->save();

        return redirect('surat_out')->with('msg','Data Berhasil Di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratKeluarRequest $request, SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        //
    }
}
