<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratmasuk = SuratMasuk::all();

                return view ('suratmasuk.index',compact(['suratmasuk']));
    }

    public function create()
    {
        return view('suratmasuk.create');
    }

    public function store(Request $request)
    {


        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file/Masuk'),$data_nama);

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

        SuratMasuk::create([
            'no_surat' => $request->txtnosurat,
            'jenis_surat' => $request->txtjenissurat,
            'tgl_surat' => $request->tglsurat,
            'tgl_terima' => $request->tglditerima,
            'dari' => $request->txtdari,
            'perihal' => $request->txtperihal,
            'file_surat' => $data_nama,
            'keterangan' => $request->txtketerangan,
        ]);

        return redirect('/suratmasuk')->with('success','Data Surat Masuk Berhasil.');
    }

    public function edit($id)
    {
        $dp = suratmasuk::find($id);
        return view('suratmasuk.edit',compact(['dp']));
    }

    public function update(Request $request,$id)
    {
        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file/Masuk'),$data_nama);

        $sm = SuratMasuk::find($id);
        $sm->update([
            'no_surat' => $request->txtnosurat,
            'jenis_surat' => $request->txtjenissurat,
            'tgl_surat' => $request->tglsurat,
            'tgl_terima' => $request->tglditerima,
            'dari' => $request->txtdari,
            'perihal' => $request->txtperihal,
            'file_surat' => $data_nama,
            'keterangan' => $request->txtketerangan,
        ]);

        return redirect('/suratmasuk')->with('success','Data Surat Masuk Berhasil Di Ubah .');

    }

    public function destroy($id){
        $dp = suratmasuk::find($id);
        $dp->delete();

        return redirect('/suratmasuk')->with('success','Data Surat Masuk Berhasil Hapus .');
    }

    public function search(Request $request) {

        // dd($request);
        $keyword=$request->input('cari');
         $suratmasuk=SuratMasuk::where('no_surat','LIKE','%'.$keyword.'%')->get();
        return view('suratmasuk.index',compact(['suratmasuk']));

    }
}
