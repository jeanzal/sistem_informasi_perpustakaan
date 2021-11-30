@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Anggota</h4>
                      
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" autocomplete="off" value="{{ old('nama') }}" required>
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
                                <input id="nim" type="number" class="form-control" name="nim" value="{{ old('nim') }}" maxlength="8" required>
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
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                            <label for="jurusan" class="col-md-4 control-label">Jurusan</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jurusan" required="">
                                <option value=""></option>
                                <option value="TI">Teknik Informatika</option>
                                <option value="TS">Teknik Sipil</option>
                                <option value="EM">Ekonomi Manajemen</option>
                                <option value="FR">Farmasi</option>
                                <option value="MG">Musik Gereja</option>
                                <option value="TKK">Teologi Konseling Kristen</option>
                                <option value="PAK">Pendidikan Agama Kristen</option>
                                <option value="AK">Akuntansi</option>
                                <option value="FIS">Fisika</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                            <label for="no_hp" class="col-md-4 control-label">No. Handphone</label>
                            <div class="col-md-6">
                                <input id="no_hp" type="number" class="form-control" name="no_hp" autocomplete="off" value="{{ old('no_hp') }}" maxlength="8" required>
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
                                <input id="alamat" type="text" class="form-control" name="alamat" autocomplete="off" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;" >
                            <label for="user_id" class="col-md-4 control-label">Hak Akses</label>
                            <div class="col-md-6">
                            <select class="form-control" name="user_id" required="">
                                <option value="">(Cari User)</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm" id="submit">
                                    Tambah
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-light btn-sm pull-right">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection