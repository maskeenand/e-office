@extends('ekuitas/app')

@section('title','Surat Masuk')

@section('content')

<h1 class="mb-0">Profile</h1>
<hr />

<form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="" >
<div class="row">
    <div class="col-md-12 border-right">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Profile Settings</h4>
            </div>

            <div class="row mb-3">
                <label for="txtnama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  id="txtnama" name="txtnama" value="{{ auth()->user()->name }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                </div>
            </div>

            <div class="row mb-3">
                <label for="txtphone" class="col-sm-2 col-form-label">Telpon</label>
                <div class="col-sm-4">
                <input type="text" name="txtphone" class="form-control" value="{{ auth()->user()->phone }}" >
                </div>
            </div>

            <div class="row mb-3">
                <label for="txtalamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                <input type="text" name="txtalamat" class="form-control" value="{{ auth()->user()->address }}" >
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-4">
                    <button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button>
                </div>
            </div>


        </div>
    </div>

</div>

@endsection
