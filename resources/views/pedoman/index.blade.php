@extends('layout.master')

@section('konten')


<div class="row">
<div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>PEDOMAN</h6>
        {{-- <a href="/suratmasuk/create" class="btn btn-primary ">add</a> --}}
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Tambah Data</button>
      </div>
      <div class="card-body px-2 pt-0 pb-2">
        <div class="table-responsive p-2">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th>No.</th>
                <th class="text-secondary p-2">No SK Pedoman</th>
                <th class="text-secondary p-2">Tanggal Pedoman</th>
                <th class="text-secondary p-2">Judul Pedoman</th>
                <th class="text-secondary p-2">Keterangan</th>
                <th class="text-secondary p-2">File Dokumen</th>
                <th class="text-secondary opacity-7">Action</th>
              </tr>
            </thead>
            <tbody>
            @php
                $no=1;
            @endphp
                @foreach ( $dokumen as $dp)
              <tr>
                <th style='text-align:center'>{{ $no++ }}</th>
               <td>{{ $dp->no_sk_pedoman }}</td>
               <td>{{ $dp->tgl_pedoman }}</td>
               <td>{{$dp->judul_pedoman}}</td>
               <td>{{$dp->keterangan}}</td>
              <td>
                <a href="file/pedoman/{{ $dp->file }}"><button class="btn btn-success" type="button">Download</button></a>
                {{-- {{$dp->file_surat}} --}}
                </td>
             

                    <td>
                        <a href="/pedoman/{{ $dp->id }}/edit" class="btn btn-warning" >Edit</a>
                    </td>
                    <td>
                        <form onsubmit="return deleteData('{{ $dp->no_sk_pedoman }}')" style="display: inline" action="/pedoman/{{ $dp->id }}" method="POST">
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
                <h4 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Tambah Data PEDOMAN</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body ">
                        <form method="POST" action="/pedoman" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="txtnosurat" class="col-sm-3 col-form-label">No SK Pedoman</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtno_sk_pedoman') is-invalid @enderror" id="txtno_sk_pedoman" name="txtno_sk_pedoman">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="tglsurat" class="col-sm-3 col-form-label">Tanggal Pedoman</label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control form-control-sm @error('tglpedoman') is-invalid @enderror" id="tglpedoman" name="tglpedoman">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtdari" class="col-sm-3 col-form-label">Judul Pedoman</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtjudul_pedoman') is-invalid @enderror" id="txtjudul_pedoman" name="txtjudul_pedoman">
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
                                    <a href="/pedoman" class="btn btn-secondary"> Batal</a>

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
