<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreSuratMasukRequest;
use App\Http\Requests\UpdateSuratMasukRequest;
use App\Models\SuratMasuk;


class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $surat = DB::table('surat_masuk')-> get();
        // return view ('admin/surat_masuk',['surat_masuk' => $surat]);

        $search = $request->query('cari');

        if(!empty($search)){
            $suratmasuk = SuratMasuk::where('surat_masuk.no_surat', 'like' , '%' .$search. '%')
                          ->orWhere('surat_masuk.dari','like','%' .$search. '%')
                          ->paginate(10)->fragment('std');
        }else{
            $suratmasuk = SuratMasuk::paginate(5)->fragment('std');
        }

        $suratmasuk = SuratMasuk::paginate(10)->fragment('std');
        return view('suratmasuk/surat_masuk')->with([
            'suratmasuk' => $suratmasuk,
            'cari' => $search
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuratMasukRequest $request)
    {
        // $validate = $request->validated();
        // dd($request->all());
        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file'),$data_nama);

        $surat = new SuratMasuk;
        $surat->no_surat = $request->txtnosurat;
        $surat->tgl_surat = $request->tglsurat;
        $surat->tgl_terima = $request->tglditerima;
        $surat->dari = $request->txtdari;
        $surat->perihal = $request->txtperihal;
        $surat->disposisi = $request->txtdisposisi;
        $surat->file_surat = $data_nama;
        $surat->keterangan = $request->txtketerangan;
        $surat->save();

         return redirect('surat_masuk')->with('msg','Data Berhasil Di simpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratmasuk,$no_surat)
    {
        // echo "$no_surat";
        $data = $suratmasuk->find($no_surat);
        return view('suratmasuk/edit_surat_masuk')->with([
            'txtnosurat' =>$no_surat,
            'tglsurat' => $data->tgl_surat,
            'tglditerima' => $data->tgl_terima,
            'txtdari' => $data->dari,
            'txtperihal' => $data->perihal,
            'txtdisposisi' => $data->disposisi,
            'doc'=>$data->data_nama,
            'txtketerangan' => $data->keterangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratMasukRequest $request, SuratMasuk $suratmasuk, $no_surat)
    {
        $data_file =$request->file('doc');
        $data_ekstensi = $data_file->extension();
        $data_nama=date('Ymdhis').".".$data_ekstensi;
        $data_file->move(public_path('file'),$data_nama);


        $data =$suratmasuk->find($no_surat);
        $data->no_surat = $request->txtnosurat;
        $data->tgl_surat = $request->tglsurat;
        $data->tgl_terima = $request->tglditerima;
        $data->dari = $request->txtdari;
        $data->perihal = $request->txtperihal;
        $data->disposisi = $request->txtdisposisi;
        $data->file_surat = $data_nama;
        $data->keterangan = $request->txtketerangan;
        $data->save();

         return redirect('surat_masuk')->with('msg',' Di Rubah dengan No'.$data->no_surat.'');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratmasuk,$no_surat)
    {


        $data =$suratmasuk->find($no_surat);
        File::delete(public_path('file').'/'.$data->file);

        $data->delete();
        return redirect('surat_masuk')->with('msg',' Di HAPUS dengan No'.$data->no_surat.'');


    }
}
