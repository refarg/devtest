@extends('layouts.app')
@section('js')
@foreach($komeng as $komen)
<script>
$(".reply{{$komen->idkomentar}}").hide();
$("#reply{{$komen->idkomentar}}").click(function(){
$(".reply{{$komen->idkomentar}}").toggle(0,$(".komm").hide(),$(".btnko").show());
});
</script>
@endforeach
<script>
$(".btnko").hide();
$(".btnko").click(function(){
    $(".rep").hide();
    $(".komm").show();
    $(".btnko").hide();
});
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lihat Barang: {{$show->namabarang}}</div>
                <div class="panel-body">
                    <div class="form-horizontal">

                        <div class="form-group">
                        <div class="col-md-12">

                          @if(is_null($show->gambarbarang))
                          <img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @elseif( $show->gambarbarang == '')
                          <img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @else
                          <img src="{{ asset('image/'.$show->gambarbarang) }}" alt="Gambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @endif
                            <p class="text-center" style="font-weight:bold;">Contoh Barang</p>
                        </div>
                      </div>

                            <div class="form-group{{ $errors->has('namabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="namabarang" value="{{$show->namabarang}}" readonly/>
                            @if ($errors->has('namabarang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('jenisbarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Jenis Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$show->jenisbarang}}" readonly/>
                              @if ($errors->has('jenisbarang'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('jenisbarang') }}</strong>
                                  </span>
                              @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('stok') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Stok</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="stok" value="{{$show->stok}}" readonly/>
                            @if ($errors->has('stok'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('stok') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Harga Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="hargabarang" value="{{$show->hargabarang}}" readonly/>
                            @if ($errors->has('hargabarang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hargabarang') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-6">
                            <textarea class="form-control" name="deskripsi" rows="3" readonly>{{$show->deskripsi}}</textarea>
                            @if ($errors->has('deskripsi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>
                            <form method="post" action="/belibarang/{{$show->idbarang}}">
                              {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Jumlah yang diinginkan</label>
                            <div class="col-md-6">
                            @if($show->stok==0)
                            <a href="" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modalKosong">Stok Kosong</a>
                            @elseif($show->stok>0)
                            <input type="number" min="1" max="{{$show->stok}}" class="form-control" name="jumlahbarang" placeholder="Jumlah barang yang ingin dibeli" required/>
                            @endif
                            </div>
                        </div>
                        @if($show->stok>0)
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block">Beli</button>
                        </div>
                        </div>
                        @endif
                            </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
  <div class="panel panel-default col-sm-8 col-md-offset-2">
<div class="row">
<div class="col-sm-8 col-md-offset-0">
<h3>Komentar</h3>
</div>
</div>
@foreach($komeng as $komen)
<div class="row">
<div class="col-sm-2 col-md-offset-0">
<div class="thumbnail">
<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
</div>
</div>

<div class="col-sm-10 col-md-offset-0">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<strong>{{$komen->name}}</strong> <span class="text-muted">dikirim pada {{ Carbon\Carbon::parse($komen->created_at)->formatLocalized('%d %B %Y %H:%I:%S')}}</span>
<div class="pull-right">
@if(!Auth::guest())
<span class="text-muted"><a id="reply{{$komen->idkomentar}}" class="btnrp btn-sm btn-success">Balas</a></span>
@if(Auth::User()->id==$komen->iduser)
<span class="text-muted"><a data-toggle="modal" data-target="#modalEdit{{$loop->iteration}}" class="btn-sm btn-primary">Edit</a></span>
<span class="text-muted"><a data-toggle="modal" data-target="#modalHapus{{$loop->iteration}}" class="btn-sm btn-danger">Hapus</a></span>
@elseif(Auth::User()->level==1)
<span class="text-muted"><a data-toggle="modal" data-target="#modalHapusAdm{{$loop->iteration}}" class="btn-sm btn-danger">Hapus (Admin)</a></span>
@endif
@endif
</div>
</div>
<div class="panel-body">
{{$komen->komentar}}
</div>
</div>
</div>
</div>
@if(!Auth::guest())
<div class="col-sm-12 rep reply{{$komen->idkomentar}}">
  <div class="panel panel-default">
<div class="panel-heading">Tambahkan Balasan Komentar sebagai {{Auth::user()->name}}</div>
<div class="panel-body">
  <form class="form-horizontal" enctype="multipart/form-data" action="/postreply/{{$komen->idkomentar}}" method="POST">
    {{csrf_field()}}
  <textarea class="form-control" rows="5" id="comment" name="replykom"></textarea>
  <button type="submit" class="pull-right btn btn-primary float-right">Submit</button>
  </form>
</div>
  </div>
</div>
@endif
@foreach($replykom as $reply)
@if($reply->idkomentar==$komen->idkomentar)
<div class="row">
<div class="col-sm-2 col-md-offset-1">
<div class="thumbnail">
<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
</div>
</div>

<div class="col-sm-9 col-md-offset-0">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<strong>{{$reply->name}}</strong> <span class="text-muted">dikirim pada {{ Carbon\Carbon::parse($komen->created_at)->formatLocalized('%d %B %Y %H:%I:%S')}}</span>
<div class="pull-right">
@if(Auth::guest())
@elseif(Auth::User()->id==$reply->iduser)
<span class="text-muted"><a data-toggle="modal" data-target="#modalEditReply{{$loop->iteration}}" class="btn-sm btn-primary">Edit</a></span>
<span class="text-muted"><a data-toggle="modal" data-target="#modalHapusReply{{$loop->iteration}}" class="btn-sm btn-danger">Hapus</a></span>
@endif
</div>
</div>
<div class="panel-body">
{{$reply->replykomentar}}
</div>
</div>
</div>
</div>

@if(!Auth::guest() && Auth::User()->id==$reply->iduser)
<div class="modal fade" id="modalEditReply{{$loop->iteration}}" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="form-horizontal" enctype="multipart/form-data" action="/editreply/{{$reply->idreply}}" method="POST">
        {{csrf_field()}}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mengedit Komentar Balasan</h4>
      </div>
      <div class="modal-body">
        <textarea class="form-control" rows="5" id="comment" name="replykomentar">{{$reply->replykomentar}}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <button type="submit" class="btnsumbit btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endif
@if(!Auth::guest() && Auth::User()->id==$reply->iduser)
<div class="modal fade" id="modalHapusReply{{$loop->iteration}}" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Komentar Balasan</h4>
      </div>
      <div class="modal-body">
        <p>Anda hendak menghapus komentar balasan<br>
          Ingin melanjutkan?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button> <button type="button" class="btnsumbit btn btn-danger" onclick="location.href='/hapusreply/{{$reply->idreply}}';">Hapus</button>
      </div>
    </div>
  </div>
</div>
@endif

@endif
@endforeach
@if(!Auth::guest() && Auth::User()->id==$komen->iduser)
<div class="modal fade" id="modalEdit{{$loop->iteration}}" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form class="form-horizontal" enctype="multipart/form-data" action="/editkomen/{{$komen->idkomentar}}" method="POST">
        {{csrf_field()}}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mengedit Komentar</h4>
      </div>
      <div class="modal-body">
        <textarea class="form-control" rows="5" id="comment" name="komentar">{{$komen->komentar}}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <button type="submit" class="btnsumbit btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endif
@if(!Auth::guest() && Auth::User()->id==$komen->iduser)
<div class="modal fade" id="modalHapus{{$loop->iteration}}" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Komentar</h4>
      </div>
      <div class="modal-body">
        <p>Anda hendak menghapus komentar<br>
          Ingin melanjutkan?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button> <button type="button" class="btnsumbit btn btn-danger" onclick="location.href='/hapuskomentar/{{$komen->idkomentar}}';">Hapus</button>
      </div>
    </div>
  </div>
</div>
@endif

@if(!Auth::guest() && Auth::User()->level==1)
<div class="modal fade" id="modalHapusAdm{{$loop->iteration}}" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Komentar</h4>
      </div>
      <div class="modal-body">
        <p>Anda hendak menghapus komentar<br>
          Ingin melanjutkan?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button> <button type="button" class="btnsumbit btn btn-danger" onclick="location.href='/hapuskomentar/{{$komen->idkomentar}}';">Hapus</button>
      </div>
    </div>
  </div>
</div>
@endif

@endforeach
@if(!Auth::guest())
<div class="btnko col-sm-12">
  <div class="panel panel-default">
<button type="button" class="btn btn-primary btn-block">Tampilkan Kotak Komentar</button>
</div>
</div>
<div class="col-sm-12 komm">
  <div class="panel panel-default">
<div class="panel-heading">Tambahkan Komentar sebagai {{Auth::user()->name}}</div>
<div class="panel-body">
  <form class="form-horizontal" enctype="multipart/form-data" action="/postkomen/{{$show->idbarang}}" method="POST">
    {{csrf_field()}}
  <textarea class="form-control" rows="5" id="comment" name="komentar"></textarea>
  <button type="submit" class="pull-right btn btn-primary float-right">Submit</button>
  </form>
</div>
  </div>
</div>
</div>
</div>
</div>
@endif
@endsection
