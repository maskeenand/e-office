@extends('ekuitas/app')

@section('title','Surat Masuk')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="h3 m-0 font-weight-bold text-primary">Edit Surat Masuk </h1>

    </div>
    <div class="card-body">
        <div class="pb-3">
            <a href="/surat_masuk" class="btn btn-sm btn-secondary"><i class="fas fa-plus-circle"></i> Kembali</a>
        </div>

        <div class="table-responsive">
            <form method="POST" action="{{ url('surat_masuk/'.$txtnosurat) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="txtnosurat" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm " id="txtnosurat" name="txtnosurat" value="{{ $txtnosurat }}">
                      @error('txtnosurat')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="tglsurat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control form-control-sm " id="tglsurat" name="tglsurat"
                      value="{{ $tglsurat }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="tglditerima" class="col-sm-2 col-form-label">Tanggal Diterima</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control form-control-sm " id="tglditerima" name="tglditerima"
                       value="{{ $tglditerima }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtdari" class="col-sm-2 col-form-label">Dari</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm " id="txtdari" name="txtdari" value="{{ $txtdari }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtperihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm " id="txtperihal" name="txtperihal" value="{{ $txtperihal }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtdisposisi" class="col-sm-2 col-form-label">Disposisi</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm " id="txtdisposisi" name="txtdisposisi" value="{{ $txtdisposisi }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="doc" class="col-sm-2 col-form-label">File Surat</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control" id="doc" name="doc">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtketerangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-4">
                      <textarea class="form-control form-control-sm " id="txtketerangan" name="txtketerangan" > {{ $txtketerangan }}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary">Batal</button>
                    </div>
                  </div>
              </form>
        </div>
    </div>
</div>


@endsection



