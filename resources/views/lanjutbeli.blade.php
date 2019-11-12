@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pemesanan Barang: {{$barang->namabarang}}</div>
                <div class="panel-body">
                    <div class="form-horizontal">
                      <form method="post" action="/belibarang/{{$barang->idbarang}}">
                        {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('namalengkap') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nama Pembeli</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="namalengkap" value="{{$detuser->namalengkap}}" readonly/>
                            @if ($errors->has('namalengkap'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('namalengkap') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Alamat Pembeli</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="alamat" value="{{$detuser->alamat}}" readonly/>
                              @if ($errors->has('alamat'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('alamat') }}</strong>
                                  </span>
                              @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('nomortelepon') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nomor Telepon</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="nomortelepon" value="{{$detuser->nomorponsel}}" readonly/>
                            @if ($errors->has('nomortelepon'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nomortelepon') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Jumlah yang diinginkan</label>
                            <div class="col-md-6">
                            @if($barang->stok==0)
                            <a href="" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modalKosong">Stok Kosong</a>
                            @elseif($barang->stok>0)
                            <input type="number" min="1" max="{{$barang->stok}}" class="form-control" name="jumlahbarang" placeholder="Jumlah barang yang ingin dibeli" required/>
                            @endif
                            </div>
                            </div>

                        @if($barang->stok>0)
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block">Beli</button>
                        </div>
                        </div>
                        @endif

                        <div class="form-group text-center">
                        <label for="text" class="text-center col-md-12 control-label">Untuk mengganti detail pengiriman, anda dapat mengubahnya melalui menu profil.<br>Anda dapat mengganti detail pengiriman setelah semua barang yang anda pesan sebelumnya diterima.</label>
                        </div>
                            </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
