<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use Illuminate\Http\Request;

class NotulenController extends Controller
{
    public function index(){
        $notulen = Notulen::all();
        return view ('notulen.index',compact(['notulen']));

    }


    public function store(Request $request)
    {

        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file/notulen'),$data_nama);

    

        Notulen::create([
            'hari_tanggal' => $request->txthari_tanggal,
            'jam' => $request->jam,
            'tempat' => $request->txttempat,
            'pimpinan_rapat' => $request->txtpimpinan_rapat,
            'file' => $data_nama,
        ]);

        return redirect('/notulen')->with('success','Data Perjanjian Kerjasama. Berhasil.');
    }
}
