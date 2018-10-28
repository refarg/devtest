@section('js')
<script src="{{asset('js/jquery.matchHeight-min.js')}}"></script>
<script>
$(function() {
    $(".btnsumbit").attr("disabled", false);
    $('.box').matchHeight();
    $('.cap').matchHeight();
});
</script>
@endsection
@section('css')
<style type="text/css">
@media only screen and (max-width : 767px) {
    .box {
        height: auto !important;
    }
    .panel-footer {
      position: absolute;
      padding: 0 auto;
      bottom: 0;
    }
}
.thumbnail img {
    height:250px;
    width:100%;
}

.panel-heading h3 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: normal;
    width: 75%;
    padding-top: 8px;
}
.desc{
  -ms-word-break: break-all;
  word-break: break-all;

  /* Non standard for webkit */
  word-break: break-word;

  -webkit-hyphens: auto;
  -moz-hyphens: auto;
  hyphens: auto;
}
</style>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title pull-left">
                  Daftar Barang
                </h3>
                    <a href="/registbarang" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah Barang</a>
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="row">
@foreach($tampil as $data)
<div class="col-sm-6 col-md-4">
    <div class="thumbnail box">
      @if(is_null($data->gambarbarang))
      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY2MmRiMTU5ODYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjYyZGIxNTk4NiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS41IiB5PSIxMDUuNyI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="Gambar">
      @elseif( $data->gambarbarang == '')
      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY2MmRiMTU5ODYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjYyZGIxNTk4NiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS41IiB5PSIxMDUuNyI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="..." />
      @else
      <img src="{{ asset('image/'.$data->gambarbarang) }}" alt="..." />
      @endif
      <div class="caption cap">
        <h3><a href="/viewbarang/{{$data->idbarang}}">{{$data->namabarang}}</a></h3>
        <p>Jenis: {{$data->jenisbarang}}</p>
        <p class="desc">Deskripsi: {{$data->deskripsi}}</p>
        <p>Stok: {{$data->stok}} buah</p>
        <p>Harga: Rp. {{number_format($data->hargabarang)}}</p>
      </div>
        <p class="text-center"><a href="/editbarang/{{$data->idbarang}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{$loop->iteration}}"><i class="glyphicon glyphicon-remove"></i> Hapus</button></p>
    </div>
</div>

<div class="modal fade" id="modalHapus{{$loop->iteration}}" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Data</h4>
      </div>
      <div class="modal-body">
        <p>Anda hendak menghapus data dengan keterangan berikut:
          <p>Nama Barang: {{$data->namabarang}}<br>Stok: {{$data->stok}} buah<br>Harga: Rp. {{number_format($data->hargabarang)}}</p>
          Ingin melanjutkan?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button> <button type="button" class="btnsumbit btn btn-danger" onclick="location.href='/hapusbarangmod/{{$data->idbarang}}';"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>

                    </div>
                    <div class="text-center">
                    {{ $tampil->links() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
