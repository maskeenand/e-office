@extends('ekuitas/app')

@section('title','Surat Keluar')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="h3 m-0 font-weight-bold text-success">Surat Kelur </h1>
    </div>
    <div class="card-body">


    <!-- FORM PENCARIAN -->

        <form method="GET">
            <div class="mb-3">
            {{-- <input  type="text" class="form-control form-control-sm" value="{{ $cari }}"   placeholder="Masukkan kata kunci" name="search" autofocus> --}}
            {{-- <button class="btn btn-secondary" type="submit">Cari</button> --}}

            </div>
        </form>


      <!-- TOMBOL TAMBAH DATA -->
      <div class="pb-3">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Tambah Data</button>
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
                        <div class="card shadow mb-10">
                            <div class="card-body">
                                <div class="pb-3">
                                    <a href="/surat_masuk" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
                                </div>

                                    <form method="POST" action="{{ url('surat_out') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-8">
                                            <label for="txtnosurat" class="col-sm-3 col-form-label">No Surat</label>
                                            <div class="col-sm-5">
                                              <input type="text" class="form-control form-control-sm @error('txtnosurat') is-invalid @enderror" id="txtnosurat" name="txtnosurat" value="{{ old('txtnosurat') }}">
                                              @error('txtnosurat')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                              @enderror
                                            </div>
                                          </div>

                                          <div class="row mb-8">
                                            <label for="tglsurat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                            <div class="col-sm-5">
                                              <input type="date" class="form-control form-control-sm @error('tglsurat') is-invalid @enderror" id="tglsurat" name="tglsurat">
                                            </div>
                                          </div>

                                          <div class="row mb-3">
                                            <label for="txtkepada" class="col-sm-3 col-form-label">Kepada</label>
                                            <div class="col-sm-5">
                                              <input type="text" class="form-control form-control-sm @error('txtkepada') is-invalid @enderror" id="txtkepada" name="txtkepada">
                                            </div>
                                          </div>

                                          <div class="row mb-3">
                                            <label for="txtperihal" class="col-sm-3 col-form-label">Perihal</label>
                                            <div class="col-sm-5">
                                              <input type="text" class="form-control form-control-sm @error('txtperihal') is-invalid @enderror" id="txtperihal" name="txtperihal">
                                            </div>
                                          </div>

                                          <div class="row mb-4">
                                            <label for="doc" class="col-sm-3 col-form-label">File Surat</label>
                                            <div class="col-sm-5">
                                              <input type="file" class="form-control" id="doc" name="doc">
                                            </div>
                                          </div>

                                          <div class="row mb-3">
                                            <label for="txtketerangan" class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-5">
                                              <textarea class="form-control form-control-sm @error('txtketerangan') is-invalid @enderror" id="txtketerangan" name="txtketerangan"> </textarea>
                                            </div>
                                          </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>

                </div>
                </form>
                </div>
            </div>
            </div>
     <!-- AKHIR TAMBAH DATA-->


      @if (session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong></strong>{{ session('msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="table-responsive">
      <table class="table table-sm  table-hover table-fixed " id="dataTable" width="100%" cellspacing="0">


          <thead class="table-success">
              <tr class="text-center ">
                  <th >No.</th>
                  <th style='text-align:justify'>No Surat</th>
                  <th style='text-align:justify'>Tanggal Surat</th>
                  <th style='text-align:justify'>Dari</th>
                  <th style='text-align:justify'>Perihal</th>
                  <th >File surat</th>
                  <th >Keterangan</th>
                  <th >#</th>

              </tr>

          </thead>
          <tbody>
            @php
                $nomor = 1 + (($suratkeluar->currentPage() - 1) * $suratkeluar->perPage());
            @endphp
                @foreach ($suratkeluar as $out)
              <tr>
                  {{-- <th>{{$loop->iteration}}</th> --}}
                  <th style='text-align:center'>{{ $nomor++ }}</th>
                  <td style='text-align:justify'>{{$out->no_surat}}</td>
                  <td>{{$out->tgl_surat}}</td>
                  <td>{{$out->kepada}}</td>
                  <td>{{$out->perihal}}</td>
                  <td style='text-align:center'>
                    <a href="surat_keluar/{{ $out->file_surat }}"><button class="btn btn-success" type="button">Download</button></a>
                    {{-- {{$dp->file_surat}} --}}
                </td>
                  <td>{{$out->keterangan}}</td>

                  <td>
                    <button onclick="window.location='{{ url('surat_out/'.$out->no_surat) }}'" type="button" class="btn btn-sm btn-info" title="Edit Data">
                        <i class="fas fa-edit"></i>
                    </button>
                      <form onsubmit="return deleteData('{{ $out->dari }}')" style="display: inline" method="POST" action="{{ url('surat_out/'.$out->no_surat) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>
                      </form>

                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      {{ $suratkeluar->links() }}
      </div>

  </div>

</div>

<script>

    function deleteData(name){
        pesan = confirm(`Yakin Data Surat  ${name} Akan di Hapus / Delete `);
        if(pesan) return true;
        else return false;
    }
</script>




@endsection



