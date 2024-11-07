@extends('layout.master')

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Edit Surat Keluar</h6>
          </div>
          <div class="card-body px-4 pt-0 pb-2">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="/pks/{{$dp->id}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row mb-3">
                    <label for="txtnosurat" class="col-sm-3 col-form-label">No Surat Ekternal</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-sm @error('txtno_surat_ekternal') is-invalid @enderror" id="txtno_surat_ekternal" name="txtno_surat_ekternal" value="{{ $dp->no_pks_ekternal}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtnosurat" class="col-sm-3 col-form-label">No Surat Internal</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-sm @error('txtno_surat_internal') is-invalid @enderror" id="txtno_surat_internal" name="txtno_surat_internal" value="{{ $dp->no_pks_internal }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="tglsurat" class="col-sm-3 col-form-label">Tanggal Mulai </label>
                    <div class="col-sm-6">
                      <input type="date" class="form-control form-control-sm @error('tglmulai') is-invalid @enderror" id="tglmulai" name="tglmulai" value="{{ $dp->tgl_mulai }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="tglsurat" class="col-sm-3 col-form-label">Tanggal Berakhir </label>
                    <div class="col-sm-6">
                      <input type="date" class="form-control form-control-sm @error('tglberakhir') is-invalid @enderror" id="tglberakhir" name="tglberakhir" value="{{ $dp->tgl_berakhir }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtdari" class="col-sm-3 col-form-label">Jangka Waktu</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-sm @error('txtjangka_waktu') is-invalid @enderror" id="txtjangka_waktu" name="txtjangka_waktu" value="{{ $dp->jangka_waktu}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtperihal" class="col-sm-3 col-form-label">vendor</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-sm @error('txtvendor') is-invalid @enderror" id="txtvendor" name="txtvendor" value="{{ $dp->vendor}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtdari" class="col-sm-3 col-form-label">Perjanjian</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-sm @error('txtperjanjian') is-invalid @enderror" id="txtperjanjian" name="txtperjanjian" value="{{ $dp->perjanjian }}">
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
                      <textarea class="form-control form-control-sm @error('txtketerangan') is-invalid @enderror" id="txtketerangan" name="txtketerangan" value="{{ $dp->keterangan}}"> </textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="" class="col-sm-3x col-form-label"></label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/pks" class="btn btn-secondary"> Batal</a>
                    </div>
                  </div>
        </div>
        </div>
    </div>
</div>
@endsection
