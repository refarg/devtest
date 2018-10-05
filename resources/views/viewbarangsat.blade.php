@section('js')
<script src="{{asset('js/loadgam.js')}}" type="text/javascript"></script>
@endsection
@extends('layouts.app')
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
                          <img src="{{ asset('image/'.$show->gambarbarang) }}" id="showgambar" alt="Gambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @endif
                            <p class="text-center" style="font-weight:bold;">Preview Gambar</p>
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
                            <input type="text" class="form-control" name="jumlahbarang" placeholder="Jumlah yang ingin dibeli" required/>
                            <input type="hidden" class="form-control" name="idbarang" value="{{$show->idbarang}}" readonly/>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block">Beli</button>
                        </div>
                        </div>
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
<h3>Komentar Pembeli</h3>
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
<div class="panel-heading">
<strong>{{$komen->name}}</strong> <span class="text-muted float-right">commented 5 days ago</span>
@if(Auth::User()->id==$komen->iduser)
<span class="text-muted"><a data-toggle="modal" data-target="#modalEdit{{$loop->iteration}}" class="btn-sm btn-primary float-right">Edit</a></span>
<span class="text-muted"><a data-toggle="modal" data-target="#modalHapus{{$loop->iteration}}" class="btn-sm btn-danger float-right">Hapus</a></span>
@elseif(Auth::User()->level==1)
<span class="text-muted"><a data-toggle="modal" data-target="#modalHapus{{$loop->iteration}}" class="btn-sm btn-danger float-right">Hapus (Admin)</a></span>
@endif
</div>
<div class="panel-body">
{{$komen->komentar}}
</div>
</div>
</div>
</div>

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
@endforeach
<div class="col-sm-12">
  <div class="panel panel-default">
<div class="panel-heading">Tambahkan Komentar sebagai {{Auth::user()->name}}</div>
<div class="panel-body">
  <form class="form-horizontal" enctype="multipart/form-data" action="/postkomen/{{$show->idbarang}}" method="POST">
    {{csrf_field()}}
  <textarea class="form-control" rows="5" id="comment" name="komentar"></textarea>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
  </form>
</div>
  </div>
</div>
</div>
</div>
</div>
@endsection
