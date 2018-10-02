@section('js')
<<script src="{{asset('js/jquery.matchHeight-min.js')}}"></script>
<script>
$(function() {
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
}
.thumbnail img {
    height:250px;
    width:100%;
}
</style>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Barang</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="row">
@foreach($tampil as $data)
<div class="col-sm-6 col-md-4">
<form class="tr" method="post" action="/belibarang/{{$data->idbarang}}">
  {{ csrf_field() }}
    <div class="thumbnail box">
      @if(is_null($data->gambarbarang))
      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY2MmRiMTU5ODYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjYyZGIxNTk4NiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS41IiB5PSIxMDUuNyI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="Gambar">
      @elseif( $data->gambarbarang == '')
      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY2MmRiMTU5ODYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjYyZGIxNTk4NiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS41IiB5PSIxMDUuNyI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="..." />
      @else
      <img src="{{ asset('image/'.$data->gambarbarang) }}" alt="..." />
      @endif
      <div class="caption cap">
        <h3>{{$data->namabarang}}</h3>
        <p>Jenis: {{$data->jenisbarang}}</p>
        <p>Deskripsi: {{$data->deskripsi}}</p>
        <p>Stok: {{$data->stok}} buah</p>
        <p>Harga: Rp. {{number_format($data->hargabarang)}}</p>
      </div>
      @if($data->stok==0)
      <a href="" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modalKosong">Stok Kosong</a>
      @elseif($data->stok>0)
      <div class="row">
      <div class="col-xs-6">
      <input type="text" class="form-control" name="jumlahbarang" placeholder="Jumlah yang ingin dibeli" required/>
    </div>
    <div class="col-xs-6">
      <input type="hidden" class="form-control" name="idbarang" value="{{$data->idbarang}}" readonly/>
      <button type="submit" class="btn btn-primary btn-block">Beli</button>
    </div>
  </div>
      @endif
    </div>
</form>
</div>
@endforeach
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalKosong" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Barang Habis</h4>
      </div>
      <div class="modal-body">
        <p>Stok barang yang anda pilih kosong.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
@endsection