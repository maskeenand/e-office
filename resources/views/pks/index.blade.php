@extends('layout.master')

@section('konten')

<div class="row">
<div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Perjanjian Kerja Sama (PKS)</h6>
        {{-- <a href="/suratmasuk/create" class="btn btn-primary ">add</a> --}}
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Tambah Data</button>
      </div>
      <div class="card-body px-2 pt-0 pb-2">
        <div class="table-responsive p-2">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th>No.</th>
                <th class="text-secondary p-2">No Surat Ekternal</th>
                <th class="text-secondary p-2">No Surat Internal</th>
                <th class="text-secondary p-2">Tanggal Mulai</th>
                <th class=" text-secondary p-2">Tanggal Berakhir</th>
                <th class="text-secondary p-2">Jangka Waktu</th>
                <th class="text-secondary p-2">Vendor</th>
                <th class="text-secondary p-2">Perjanjian</th>
                <th class="text-secondary p-2">Dokumen</th>
                <th class="text-secondary p-2">Keterangan</th>
                <th class="text-secondary opacity-7">Action</th>
              </tr>
            </thead>
            <tbody>
            @php
                $no=1;
            @endphp
                @foreach ( $kerjasama as $dp)
              <tr>
                <th style='text-align:center'>{{ $no++ }}</th>
               <td>{{ $dp->no_pks_ekternal }}</td>
               <td>{{ $dp->no_pks_internal }}</td>
               <td>{{$dp->tgl_mulai}}</td>
               <td>{{$dp->tgl_berakhir}}</td>
               <td>{{$dp->jangka_waktu}}</td>
               <td>{{$dp->vendor}}</td>
               <td>{{$dp->perjanjian}}</td>
              <td>{{$dp->keterangan}}</td>
              <td>
                <a href="file/pks/{{ $dp->file }}"><button class="btn btn-success" type="button">Download</button></a>
                {{-- {{$dp->file_surat}} --}}
                </td>
             

                    <td>
                        <a href="/pks/{{ $dp->id }}/edit" class="btn btn-warning" >Edit</a>
                    </td>
                    <td>
                        <form onsubmit="return deleteData('{{ $dp->no_pks_ekternal }}')" style="display: inline" action="/pks/{{ $dp->id }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                    </td>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal TAMBAH DATA -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Tambah Data Perjanjian kerjasama (PKS)</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body ">
                        <form method="POST" action="/pks" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="txtnosurat" class="col-sm-3 col-form-label">No Surat Ekternal</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtno_surat_ekternal') is-invalid @enderror" id="txtno_surat_ekternal" name="txtno_surat_ekternal">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtnosurat" class="col-sm-3 col-form-label">No Surat Internal</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtno_surat_internal') is-invalid @enderror" id="txtno_surat_internal" name="txtno_surat_internal">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="tglsurat" class="col-sm-3 col-form-label">Tanggal Mulai </label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control form-control-sm @error('tglmulai') is-invalid @enderror" id="tglmulai" name="tglmulai">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="tglsurat" class="col-sm-3 col-form-label">Tanggal Berakhir </label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control form-control-sm @error('tglberakhir') is-invalid @enderror" id="tglberakhir" name="tglberakhir">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtdari" class="col-sm-3 col-form-label">Jangka Waktu</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtjangka_waktu') is-invalid @enderror" id="txtjangka_waktu" name="txtjangka_waktu">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtperihal" class="col-sm-3 col-form-label">vendor</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control form-control-sm @error('txtvendor') is-invalid @enderror" id="txtvendor" name="txtvendor"></textarea>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtdari" class="col-sm-3 col-form-label">Perjanjian</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtperjanjian') is-invalid @enderror" id="txtperjanjian" name="txtperjanjian">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="doc" class="col-sm-3 col-form-label">File Surat</label>
                                <div class="col-sm-6">
                                  <input type="file" class="form-control" id="doc" name="doc">
                                  {{-- <input type="text" class="form-control form-control-sm @error('txtperihal') is-invalid @enderror" id="txtfilesurat" name="txtfilesurat"> --}}
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtketerangan" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control form-control-sm @error('txtketerangan') is-invalid @enderror" id="txtketerangan" name="txtketerangan"> </textarea>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="" class="col-sm-3x col-form-label"></label>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/pks" class="btn btn-secondary"> Batal</a>

                                </div>
                              </div>
                        </form>
                </div>
            </div>
    </div>
    </div>

<!-- Modal AKHIR TAMBAH DATA -->

<script>

    function deleteData(name){
        pesan = confirm(`Yakin No Surat  ${name} Akan di Hapus / Delete`);
        if(pesan) return true;
        else return false;
    }
</script>

@endsection
