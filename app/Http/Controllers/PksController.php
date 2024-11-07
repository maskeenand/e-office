<?php

namespace App\Http\Controllers;



use App\Models\Pks;
use Illuminate\Http\Request;

class PksController extends Controller
{
    public function index(){
        $kerjasama = Pks::all();
                return view ('pks.index',compact(['kerjasama']));
    }


    public function store(Request $request)
    {

        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file/pks'),$data_nama);

    

        Pks::create([
            'no_pks_ekternal' => $request->txtno_surat_ekternal,
            'no_pks_internal' => $request->txtno_surat_internal,
            'tgl_mulai' => $request->tglmulai,
            'tgl_berakhir' => $request->tglberakhir,
            'jangka_waktu' => $request->txtjangka_waktu,
            'vendor' => $request->txtvendor,
            'perjanjian' => $request->txtperjanjian,
            'file' => $data_nama,
            'keterangan' => $request->txtketerangan,
        ]);

        return redirect('/pks')->with('success','Data Perjanjian Kerjasama. Berhasil.');
    }

    public function edit($id)
    {
        $dp = Pks::find($id);
        return view('pks.edit',compact(['dp']));
    }


    public function update(Request $request,$id)
    {
        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file/pks'),$data_nama);

        $sm = Pks::find($id);
        $sm->update([
            'no_pks_ekternal' => $request->txtno_surat_ekternal,
            'no_pks_internal' => $request->txtno_surat_internal,
            'tgl_mulai' => $request->tglmulai,
            'tgl_berakhir' => $request->tglberakhir,
            'jangka_waktu' => $request->txtjangka_waktu,
            'vendor' => $request->txtvendor,
            'perjanjian' => $request->txtperjanjian,
            'file' => $data_nama,
            'keterangan' => $request->txtketerangan,
        ]);

        return redirect('/pks')->with('success','Data Perjanjian kerjasama Berhasil Di Ubah .');

    }

    public function destroy($id){
        $dp = Pks::find($id);
        $dp->delete();

        return redirect('/pks')->with('success','Data Perjanjian Kerjasama Berhasil Hapus .');
    }


}
