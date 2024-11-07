@extends('layout.master')

@section('konten')


<div class="row">
<div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>NOTULEN</h6>
        {{-- <a href="/suratmasuk/create" class="btn btn-primary ">add</a> --}}
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Tambah Data</button>
      </div>
      <div class="card-body px-2 pt-0 pb-2">
        <div class="table-responsive p-2">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th>No.</th>
                <th class="text-secondary p-2">Hari/Tanggal</th>
                <th class="text-secondary p-2">Jam</th>
                <th class="text-secondary p-2">Tempat</th>
                <th class="text-secondary p-2">Agenda</th>
                <th class="text-secondary p-2">Pimpinan Rapat</th>
                <th class="text-secondary p-2">File Dokumen</th>
                <th class="text-secondary opacity-7">Action</th>
              </tr>
            </thead>
            <tbody>
            @php
                $no=1;
            @endphp
                @foreach ( $notulen as $dp)
              <tr>
                <th style='text-align:center'>{{ $no++ }}</th>
               <td>{{ $dp->hari_tanggal }}</td>
               <td>{{ $dp->jam }}</td>
               <td>{{$dp->tempat}}</td>
               <td>{{$dp->pimpinan_rapat}}</td>
              <td>
                <a href="file/notulen/{{ $dp->file }}"><button class="btn btn-success" type="button">Download</button></a>
                {{-- {{$dp->file_surat}} --}}
                </td>
             

                    <td>
                        <a href="/notulen/{{ $dp->id }}/edit" class="btn btn-warning" >Edit</a>
                    </td>
                    <td>
                        <form onsubmit="return deleteData('{{ $dp->no_sk_pedoman }}')" style="display: inline" action="/notulen/{{ $dp->id }}" method="POST">
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
                <h4 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">Tambah Data Notulen</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body ">
                        <form method="POST" action="/notulen" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="txtnosurat" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control form-control-sm @error('txthari_tanggal') is-invalid @enderror" id="txthari_tanggal" name="txthari_tanggal">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="tglsurat" class="col-sm-3 col-form-label">Jam</label>
                                <div class="col-sm-6">
                                  <input type="time" class="form-control form-control-sm @error('jam') is-invalid @enderror" id="jam" name="jam">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtdari" class="col-sm-3 col-form-label">Tempat</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txttempat') is-invalid @enderror" id="txttempat" name="txttempat">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="txtdari" class="col-sm-3 col-form-label">Pimpinan Rapat</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm @error('txtpimpinan_rapat') is-invalid @enderror" id="txtpimpinan_rapat" name="txtpimpinan_rapat">
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
                                <label for="" class="col-sm-3x col-form-label"></label>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/notulen" class="btn btn-secondary"> Batal</a>

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
