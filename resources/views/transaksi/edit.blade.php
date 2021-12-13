@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Proses Pengembalian Buku <b>{{$data->anggota->nama}}</b> </h4>
                            <form class="forms-sample">
                                <p>Kode Transaksi : {{$data->id}}</p>
                                <p>Judul Buku : {{$data->buku->judul_buku}}</p>
                                <p>Nama Peminjam : {{$data->anggota->nama}}</p>
                                <p>Tanggal Pinjam : {{$data->tgl_pinjam}}</p>
                                <p>Tanggal Kembali Seharusnya : {{$data->tgl_kembali}}</p>
                                <div class="form-group">
                                    <label>Tanggal Dikembalikan</label>
                                    <input type="date" name="tgl_dikembali" class="form-control">
                                </div>
                            </form>
                            <a href="{{route('transaksi.index')}}" class="btn btn-danger btn-sm"> Kembali</a>
                            <button type="submit" class="btn btn-sm btn-success" id="submit">
                                Proses
                            </button>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection