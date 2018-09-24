@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Barang</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="/insertBarang" method="POST">
                        {{ csrf_field() }}

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="namabarang" placeholder="Nama Barang" />
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Jenis Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="jenisbarang" placeholder="Jenis Barang" />
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi"/>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Stok</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="stok" placeholder="Stok"/>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Harga Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="hargabarang" placeholder="Harga Barang"/>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
