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
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('buku.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Data Buku <b>{{$data->judul_buku}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('judul_buku') ? ' has-error' : '' }}">
                            <label for="judul_buku" class="col-md-4 control-label">Judul Buku</label>
                            <div class="col-md-6">
                                <input id="judul_buku" type="text" class="form-control" name="judul_buku" value="{{ $data->judul_buku }}" required>
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
                                <input id="nama_penulis" type="text" class="form-control" name="nama_penulis" value="{{ $data->nama_penulis }}" required>
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
                                <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ $data->tahun_terbit }}" required>
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
                                <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ $data->jumlah_buku }}" required>
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
                                <img width="200" height="200" @if($data->gambar_buku) src="{{ asset('images/buku/'.$data->gambar_buku) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar_buku">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-warning" id="submit">
                                    Simpan
                        </button>
                        <a href="{{route('buku.index')}}" class="btn btn-danger btn-sm pull-right">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection