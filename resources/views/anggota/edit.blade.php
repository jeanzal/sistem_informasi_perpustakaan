@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('anggota.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Anggota</h4>
                      
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
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
                                <input id="nim" type="number" class="form-control" name="nim" value="{{ $data->nim }}" maxlength="8" required>
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
                            <select class="form-control" name="jk" required="">
                                <option value=""></option>
                                <option value="L" {{$data->jk === "L" ? "selected" : ""}}>Laki - Laki</option>
                                <option value="P" {{$data->jk === "P" ? "selected" : ""}}>Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                            <label for="jurusan" class="col-md-4 control-label">Jurusan</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jurusan" required="">
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
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                            <label for="no_hp" class="col-md-4 control-label">No. Handphone</label>
                            <div class="col-md-6">
                                <input id="no_hp" type="number" class="form-control" name="no_hp" value="{{ $data->no_hp }}" maxlength="8" required>
                                @if ($errors->has('no_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;" hidden>
                            <label for="user_id" class="col-md-4 control-label">User Login</label>
                            <div class="col-md-6">
                            <select class="form-control" name="user_id" required="">
                                <option value="">(Cari User)</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" {{$data->user_id === $user->id ? "selected" : ""}}>{{$user->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm" id="submit">
                                    Simpan
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-danger btn-sm pull-right">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection