<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;


class PedomanController extends Controller
{
    public function index(){
        // dd(request->all());
         $dokumen = Dokumen::all();
                return view ('pedoman.index',compact(['dokumen']));
        // return view('pedoman.index');
    }


    public function store(Request $request)
    {

        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file/pedoman'),$data_nama);

    

        Dokumen::create([
            'no_sk_pedoman' => $request->txtno_sk_pedoman,
            'tgl_pedoman' => $request->tglpedoman,
            'judul_pedoman' => $request->txtjudul_pedoman,
            'file' => $data_nama,
            'keterangan' => $request->txtketerangan,
        ]);

        return redirect('/pedoman')->with('success','Data Perjanjian Kerjasama. Berhasil.');
    }
    
}
