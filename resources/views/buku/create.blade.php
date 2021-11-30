@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

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
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Buku</h4>
                      
                        <div class="form-group{{ $errors->has('judul_buku') ? ' has-error' : '' }}">
                            <label for="judul_buku" class="col-md-4 control-label">Judul Buku</label>
                            <div class="col-md-6">
                                <input id="judul_buku" type="text" class="form-control" name="judul_buku" value="{{ old('judul_buku') }}" required>
                                @if ($errors->has('judul_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_penulis') ? ' has-error' : '' }}">
                            <label for="nama_penulis" class="col-md-4 control-label">Nama Penulis</label>
                            <div class="col-md-6">
                                <input id="nama_penulis" type="text" class="form-control" name="nama_penulis" value="{{ old('nama_penulis') }}" required>
                                @if ($errors->has('nama_penulis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_penulis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                            <label for="tahun_terbit" class="col-md-4 control-label">Tahun Terbit</label>
                            <div class="col-md-6">
                                <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                            <label for="jumlah_buku" class="col-md-4 control-label">Jumlah Buku</label>
                            <div class="col-md-6">
                                <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ old('jumlah_buku') }}" required>
                                @if ($errors->has('jumlah_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Gambar Buku</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar_buku">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" id="submit">
                                    Tambah
                        </button>
                        <button type="reset" class="btn btn-sm btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('buku.index')}}" class="btn btn-light pull-right">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection