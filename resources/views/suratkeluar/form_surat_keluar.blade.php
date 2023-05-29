@extends('ekuitas/app')

@section('title','Surat Masuk')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="h3 m-0 font-weight-bold text-primary">Surat Kelaur </h1>

    </div>
    <div class="card-body">
        <div class="pb-3">
            <a href="/surat_keluar" class="btn btn-sm btn-secondary"><i class="fas fa-plus-circle"></i> Kembali</a>
        </div>

        <div class="table-responsive">
            <form method="POST" action="{{ url('surat_keluar') }}">
                @csrf
                <div class="row mb-3">
                    <label for="txtnosurat" class="col-sm-2 col-form-label">No Surat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm @error('txtnosurat') is-invalid @enderror" id="txtnosurat" name="txtnosurat" value="{{ old('txtnosurat') }}">
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
                      <input type="date" class="form-control form-control-sm @error('tglsurat') is-invalid @enderror" id="tglsurat" name="tglsurat">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtkepada" class="col-sm-2 col-form-label">Kepada</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm @error('txtkepada') is-invalid @enderror" id="txtkepada" name="txtkepada">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtperihal" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm @error('txtperihal') is-invalid @enderror" id="txtperihal" name="txtperihal">
                    </div>
                  </div>

                  {{-- <div class="row mb-3">
                    <label for="txtfilesurat" class="col-sm-2 col-form-label">File Surat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm @error('txtfilesurat') is-invalid @enderror"" id="txtfilesurat" name="txtfilesurat">
                    </div>
                  </div> --}}

                  <div class="row mb-3">
                    <label for="txtketerangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-4">
                      <textarea class="form-control form-control-sm @error('txtketerangan') is-invalid @enderror"" id="txtketerangan" name="txtketerangan"> </textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary">Batal</button>
                    </div>
                  </div>
              </form>
        </div>
    </div>
</div>


@endsection



