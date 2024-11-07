@extends('layout.master')

@section('konten')


<div class="row">
<div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Surat Keluar</h6>
        {{-- <a href="/suratmasuk/create" class="btn btn-primary ">add</a> --}}
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Tambah Data</button>
      </div>
      <div class="card-body px-2 pt-0 pb-2">
        <div class="table-responsive p-2">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th>No.</th>
                <th class="text-secondary p-2">No Surat</th>
                <th class="text-secondary p-2">Jenis Surat</th>
                <th class=" text-secondary p-2">Tanggal Surat</th>
                <th class="text-secondary p-2">Kepada</th>
                <th class="text-secondary p-2">Perihal</th>
                <th class="text-secondary p-2">Keterangan</th>
                <th class="text-secondary p-2">File Surat</th>
                <th class="text-secondary opacity-7">Action</th>
              </tr>
            </thead>
            <tbody>
            @php
                $no=1;
            @endphp
                @foreach ( $suratkeluar as $dp)
              <tr>
                <th style='text-align:center'>{{ $no++ }}</th>
               <td>{{ $dp->no_surat }}</td>
               <td>{{ $dp->jenis_surat }}</td>
               <td>{{$dp->tgl_surat}}</td>
               <td>{{$dp->kepada}}</td>
               <td>{{$dp->perihal}}</td>
              <td>{{$dp->keterangan}}</td>
              <td>
                <a href="file/Keluar/{{ $dp->file_surat }}"><button class="btn btn-success" type="button">Download</button></a>
                {{-- {{$dp->file_surat}} --}}
                </td>

                    <td>
                        <a href="/suratkeluar/{{ $dp->id }}/edit" class="btn btn-warning" >Edit</a>
                    </td>
                    <td>
                        <form onsubmit="return deleteData('{{ $dp->no_surat }}')" style="display: inline" action="/suratkeluar/{{ $dp->id }}" method="POST">
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
                <h4 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Tambah Data Surat Keluar</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body ">
                        <form method="POST" action="/suratkeluar" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="txtnosurat" class="col-sm-3 col-form-label">No Surat</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtnosurat') is-invalid @enderror" id="txtnosurat" name="txtnosurat">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="jenis_surat" class="col-sm-3 col-form-label">Jenis Surat</label>

                                  {{-- <input type="text" class="form-control form-control-sm @error('txtjenissurat') is-invalid @enderror" id="txtjenissurat" name="txtjenissurat" > --}}
                                        <div class="col-sm-8">
                                            <select  id="txtjenissurat" name="txtjenissurat" value="{{ old('txtjenissurat') }}">
                                            <option value="Surat">Surat</option>
                                            <option value="Memo">Memo</option>
                                            </select>
                                        </div>

                              <div class="row mb-3">
                                <label for="tglsurat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control form-control-sm @error('tglsurat') is-invalid @enderror" id="tglsurat" name="tglsurat">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtdari" class="col-sm-3 col-form-label">Kepada</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtkepada') is-invalid @enderror" id="txtkepada" name="txtkepada">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtperihal" class="col-sm-3 col-form-label">Perihal</label>
                                <div class="col-sm-6">
                                  <textarea class="form-control form-control-sm @error('txtperihal') is-invalid @enderror" id="txtperihal" name="txtperihal"></textarea>
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
                                    <a href="/suratkeluar" class="btn btn-secondary"> Batal</a>

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
