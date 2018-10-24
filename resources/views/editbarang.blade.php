@section('js')
<script src="{{asset('js/loadgam.js')}}" type="text/javascript"></script>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Barang</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="/updateBarang/{{$edit->idbarang}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                        <div class="col-md-12">

                          @if(is_null($edit->gambarbarang))
                          <img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @elseif( $edit->gambarbarang == '')
                          <img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @else
                          <img src="{{ asset('image/'.$edit->gambarbarang) }}" id="showgambar" alt="Gambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @endif
                            <p class="text-center" style="font-weight:bold;">Preview Gambar</p>
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('gambarbarang') ? ' has-error' : '' }}">
                      <label for="text" class="col-md-4 control-label">Gambar Barang</label>
                      <div class="col-md-6">
                      <input type="file" accept="image/*" id="inputgambar" class="validate form-control" name="gambarbarang" placeholder="Gambar Barang" onchange="loadFile(event)" />
                      @if ($errors->has('gambarbarang'))
                          <span class="help-block">
                              <strong>{{ $errors->first('gambarbarang') }}</strong>
                          </span>
                      @endif
                      </div>
                      </div>

                            <div class="form-group{{ $errors->has('namabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="namabarang" value="{{$edit->namabarang}}"/>
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
                              <select id="dropdown" class="form-control" name="jenisbarang">
                                <option value="{{$getjen->idjenis}}" selected>{{$getjen->jenisbarang}}</option>
                                @foreach($disp as $qtl)
                                @if($qtl->idjenis != $getjen->idjenis)
                                <option value="{{$qtl->idjenis}}">{{$qtl->jenisbarang}}</option>
                                @endif
                                @endforeach
                              </select>
                              @if ($errors->has('jenisbarang'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('jenisbarang') }}</strong>
                                  </span>
                              @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="deskripsi" value="{{$edit->deskripsi}}"/>
                            @if ($errors->has('deskripsi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('stok') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Stok</label>
                            <div class="col-md-6">
                            <input type="number" min="0" max="1000" class="form-control" name="stok" value="{{$edit->stok}}"/>
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
                              <div class="input-group">
                              <div class="input-group-addon">Rp.</div>
                            <input type="number" min="0" class="form-control" name="hargabarang" value="{{$edit->hargabarang}}"/>
                            </div>
                            @if ($errors->has('hargabarang'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hargabarang') }}</strong>
                                </span>
                            @endif

                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-12 col-md-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
