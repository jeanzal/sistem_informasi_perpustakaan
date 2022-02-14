@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Detail <b>{{$data->nama}}</b></h4>
                      <form class="forms-sample">
                        <div class="form-group">
                            <div class="col-md-6">
                                <img class="product" width="200" height="200" @if($data->user->gambar) src="{{ asset('images/user/'.$data->user->gambar) }}" @endif />
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" readonly>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">
                            <label for="nim" class="col-md-4 control-label">NIM</label>
                            <div class="col-md-6">
                                <input id="nim" type="number" class="form-control" name="nim" value="{{ $data->nim }}" maxlength="8" readonly>
                                @if ($errors->has('nim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jk" required="" disabled="">
                                <option value=""></option>
                                <option value="L" {{$data->jk === "L" ? "selected" : ""}}>Laki - Laki</option>
                                <option value="P" {{$data->jk === "P" ? "selected" : ""}}>Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                            <label for="jurusan" class="col-md-4 control-label">Jurusan</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jurusan" required="" disabled="">
                                <option value=""></option>
                                <option value="TI" {{$data->jurusan === "TI" ? "selected" : ""}} >Teknik Informatika</option>
                                <option value="TS" {{$data->jurusan === "TS" ? "selected" : ""}}>Teknik Sipil</option>
                                <option value="EM" {{$data->jurusan === "EM" ? "selected" : ""}}>Ekonomi Manajemen</option>
                                <option value="FR" {{$data->jurusan === "FR" ? "selected" : ""}}>Farmasi</option>
                                <option value="MG" {{$data->jurusan === "MG" ? "selected" : ""}}>Musik Gereja</option>
                                <option value="TKK" {{$data->jurusan === "TKK" ? "selected" : ""}}>Teologi Konseling Kristen</option>
                                <option value="PAK" {{$data->jurusan === "PAK" ? "selected" : ""}}>Pendidikan Agama Kristen</option>
                                <option value="AK" {{$data->jurusan === "AK" ? "selected" : ""}}>Akuntansi</option>
                                <option value="FIS" {{$data->jurusan === "FIS" ? "selected" : ""}}>Fisika</option>
                                <option value=""></option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;">
                            <label for="user_id" class="col-md-4 control-label">User Login</label>
                            <div class="col-md-6">
                            <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ $data->user->username }}" readonly="">
                            </div>
                        </div>
                        <a href="{{route('anggota.index')}}" class="btn btn-light btn-sm pull-right">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection