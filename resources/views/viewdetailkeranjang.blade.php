@extends('layouts.app')
@section('js')
<script src="{{asset('js/loadgam.js')}}" type="text/javascript"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Pembelian</div>
                <div class="panel-body">
                    <div class="form-horizontal">

                            <div class="form-group text-center">
                              Detail Pembeli
                            </div>

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nama Pembeli</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="namapembeli" value="{{$tampil->namalengkap}}" readonly/>
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Alamat Pembeli</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="alamat" value="{{$tampil->alamat}}" readonly/>
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nomor Telepon</label>
                            <div class="col-md-6">
                            <input type="number" class="form-control" name="telepon" value="{{$tampil->nomorponsel}}" readonly/>
                            </div>
                            </div>

                            <div style="border-bottom:10px double white;width:70%;margin:auto;margin-bottom:10px;" ></div>


                            <div class="form-group text-center">
                              Detail Barang
                            </div>

                            <div class="form-group{{ $errors->has('namabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="namabarang" value="{{$tampil->namabarang}}" readonly/>
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Waktu Pembelian</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="datetime" value="{{ Carbon\Carbon::parse($tampil->created_at)->formatLocalized('%A, %d %B %Y %H:%I:%S')}}" readonly/>
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('stok') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Jumlah Barang Dibeli</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="stok" value="{{$tampil->jumlahbarang}}" readonly/>
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Harga Barang / Satuan</label>
                            <div class="col-md-6">
                              <div class="input-group">
                              <div class="input-group-addon">Rp.</div>
                            <input type="text" class="form-control" name="hargabarang" value="{{$tampil->hargabarang}}" readonly/>
                            </div>
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Total Harus Dibayar</label>
                            <div class="col-md-6">
                              <div class="input-group">
                              <div class="input-group-addon">Rp.</div>
                            <input type="text" class="form-control" name="hargabarang" value="{{$tampil->total}}" readonly/>
                            </div>
                            </div>
                            </div>

                            <div style="border-bottom:10px double white;width:70%;margin:auto;margin-bottom:10px;" ></div>

                            <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBatal">
                                    Membatalkan Pembelian
                                </button>
                            </div>
                            </div>
                            </form>


                            <div class="modal fade" id="modalBatal" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Konfirmasi Pembatalan</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Anda hendak menghapus barang dari keranjang dengan ID Keranjang {{$tampil->idpembelian}}.<br>
                                      Ingin melanjutkan?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Urungkan</button> <button type="button" class="btn btn-danger" onclick="location.href='/batalbeli/{{$tampil->idpembelian}}';">Lanjut Membatalkan</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
