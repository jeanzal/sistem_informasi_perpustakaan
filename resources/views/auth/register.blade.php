@section('js')
    <script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })


var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
    </script>
@stop

@extends('layouts.app')

@section('content')

<div class="row">
<a href="{{route('user.index')}}" class="btn btn-danger btn-sm pull-right"> <i class="menu-icon mdi mdi-backup-restore"></i><span> Kembali</span></a>
</div><br>

<div class="row">

            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">

              <!-- Tambah User -->
              
                <div class="col-6">
                  <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <h4 class="card-title">Tambah User</h4>
                      
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Gambar</label>
                            <div class="col-md-12">
                                <img class="product" width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Level</label>
                            <div class="col-md-12">
                            <select class="form-control" name="level" required="">
                                <option value=""></option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" onkeyup='check();' name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>
                            <div class="col-md-12">
                                <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation" required>
                                <span id='message'></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm" id="submit">
                                    Daftar
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                                    Reset
                        </button>
                    </form>
                    </div>
                  </div>
                </div>
                

                <!-- Tambah Anggota -->

                <div class="col-6">
                  <div class="card">
                    <div class="card-body">
                    <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <h4 class="card-title">Tambah Anggota</h4>
                      
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                            <div class="col-md-12">
                            <select class="form-control" name="jk" required="">
                                <option value=""></option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                            <label for="jurusan" class="col-md-4 control-label">Jurusan</label>
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                            <div class="col-md-12">
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
                        
                    </form>
                  </div>
              </div>
            </div>
</div>
</div>

</div>
@endsection