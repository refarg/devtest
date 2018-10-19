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

                        <div class="form-group">
                        <div class="col-md-12">

                          @if(is_null($tampil->buktibayar))
                          <img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @elseif( $tampil->buktibayar == '')
                          <img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block" />
                          @else
                          <img src="{{ asset('buktitrf/'.$tampil->buktibayar) }}" alt="Gambar" style="max-width:200px;max-height:200px;" class="img-responsive thumbnail center-block" />
                          @endif

                            <p class="text-center" style="font-weight:bold;">Bukti Pembayaran</p>
                        </div>
                      </div>

                      <form enctype="multipart/form-data" id="form" method="post" action="{{url('/submitbukti/'.$tampil->idpembelian)}}">
                      {{csrf_field()}}
                      @if($tampil->buktibayar=='' and $tampil->statusverif==0)
                      <div class="form-group{{ $errors->has('buktipembayaran') ? ' has-error' : '' }}">
                      <label for="text" class="col-md-4 control-label">Bukti Pembayaran</label>
                      <div class="col-md-6">
                      <input type="file" accept="image/*" id="inputgambar" class="form-control" name="buktipembayaran" placeholder="Bukti Pembayaran" onchange="loadFile(event)" />
                      @if ($errors->has('buktipembayaran'))
                          <span class="help-block">
                              <strong>{{ $errors->first('buktipembayaran') }}</strong>
                          </span>
                      @endif
                      </div>
                      </div>
                      @endif

                            <div class="form-group{{ $errors->has('namabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="namabarang" value="{{$tampil->namabarang}}" readonly/>
                            </div>
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

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Status Verifikasi</label>
                            <div class="col-md-6">
                              @if($tampil->buktibayar=='' and $tampil->statusverif==0)
                            <input type="text" class="form-control" name="hargabarang" value="Menunggu Pembayaran" readonly/>
                              @elseif($tampil->statusverif==0 and $tampil->buktibayar!='')
                            <input type="text" class="form-control" name="hargabarang" value="Menunggu Verifikasi Admin" readonly/>
                              @else
                            <input type="text" class="form-control" name="hargabarang" value="Telah Diverifikasi" readonly/>
                              @endif
                            </div>
                            </div>

                            @if($tampil->buktibayar=='' and $tampil->statusverif==0)
                            <div class="form-group">
                            <div class="col-md-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Unggah Bukti Pembayaran
                                </button>
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
                                    <p>Anda hendak membatalkan pemesanan dengan rincian sebagai berikut:
                                      <p>Nama Barang: {{$tampil->namabarang}}<br>Jumlah yang dipesan: {{$tampil->jumlahbarang}}<br>Total harus dibayar: Rp. {{number_format($tampil->total)}}</p>
                                      Ingin melanjutkan?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Urungkan</button> <button type="button" class="btn btn-danger" onclick="location.href='/batalbeli/{{$tampil->idpembelian}}';">Lanjut Membatalkan</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endif

                            @if(Auth::User()->level==1 and $tampil->buktibayar!='' and $tampil->statusverif==0)
                            <div class="form-group">
                            <div class="col-md-12 col-md-offset-0">
                                <a href="{{url('/verifikasi/'.$tampil->idpembelian)}}" class="btn btn-block btn-primary">Validasi</a>
                            </div>
                            </div>
                            @endif
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
