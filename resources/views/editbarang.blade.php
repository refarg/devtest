@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Barang</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="/updateBarang/{{$edit->idbarang}}" method="POST">
                        {{ csrf_field() }}

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="namabarang" value="{{$edit->namabarang}}"/>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Jenis Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="jenisbarang" value="{{$edit->jenisbarang}}" />
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="deskripsi" value="{{$edit->deskripsi}}"/>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Stok</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="stok" value="{{$edit->stok}}"/>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Harga Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="hargabarang" value="{{$edit->hargabarang}}"/>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
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
