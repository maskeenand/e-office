<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index(){
        $suratkeluar = SuratKeluar::all();

                return view ('suratkeluar.index',compact(['suratkeluar']));
    }


    public function store(Request $request)
    {


        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file/Keluar'),$data_nama);

        // $request->validate([
        //     'no_surat'=> 'required',
        //     'jenis_surat' => 'required',
        //     'tgl_surat' => 'required',
        //     'tgl_terima' => 'required',
        //     'dari' => 'required',
        //     'perihal' => 'required',
        //     'file_surat' => 'required',
        //     'keterangan' => 'required'
        // ]);

        SuratKeluar::create([
            'no_surat' => $request->txtnosurat,
            'jenis_surat' => $request->txtjenissurat,
            'tgl_surat' => $request->tglsurat,
            'kepada' => $request->txtkepada,
            'perihal' => $request->txtperihal,
            'file_surat' => $data_nama,
            'keterangan' => $request->txtketerangan,
        ]);

        return redirect('/suratkeluar')->with('success','Data Surat Masuk Berhasil.');
    }

    public function edit($id)
    {
        $dp = suratkeluar::find($id);
        return view('suratkeluar.edit',compact(['dp']));
    }


    public function update(Request $request,$id)
    {
        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file/Keluar'),$data_nama);

        $sm = SuratKeluar::find($id);
        $sm->update([
            'no_surat' => $request->txtnosurat,
            'jenis_surat' => $request->txtjenissurat,
            'tgl_surat' => $request->tglsurat,
            'kepada' => $request->txtkepada,
            'perihal' => $request->txtperihal,
            'file_surat' => $data_nama,
            'keterangan' => $request->txtketerangan,
        ]);

        return redirect('/suratkeluar')->with('success','Data Surat Masuk Berhasil Di Ubah .');

    }

    public function destroy($id){
        $dp = SuratKeluar::find($id);
        $dp->delete();

        return redirect('/suratkeluar')->with('success','Data Surat Masuk Berhasil Hapus .');
    }

}
