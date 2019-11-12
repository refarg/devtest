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
                  @foreach($tampil as $tampil)
                    <div class="form-horizontal">

                      @if($loop->iteration==1)
                        <div class="form-group">
                        <div class="col-md-12">

                          @if(is_null($tampil->buktitransfer))
                          <img src="http://placehold.it/500x300?text=Belum+Ada+Bukti+Pembayaran" id="showgambar" style="max-width:500px;max-height:300px;" class="img-responsive thumbnail center-block" />
                          @elseif( $tampil->buktitransfer == '0')
                          <img src="http://placehold.it/500x300?text=Belum+Ada+Bukti+Pembayaran" id="showgambar" style="max-width:500px;max-height:300px;" class="img-responsive thumbnail center-block" />
                          @else
                          <img src="{{ asset('buktitrf/'.$tampil->buktitransfer) }}" alt="Gambar" style="max-width:500px;max-height:300px;" class="img-responsive thumbnail center-block" />
                          @endif

                            <p class="text-center" style="font-weight:bold;">Bukti Pembayaran</p>
                        </div>
                      </div>
                      @endif

                            @if($loop->iteration==1)
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

                            @endif

                            <div class="form-group text-center">
                              Barang #{{$loop->iteration}}
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

                            @if($loop->last)
                            <div class="form-group text-center">
                              Detail Pemesanan
                            </div>

                            <div class="form-group{{ $errors->has('hargabarang') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Status Verifikasi</label>
                            <div class="col-md-6">
                              @if($tampil->buktitransfer=='0' and $tampil->statusverif==0)
                            <input type="text" class="form-control" name="hargabarang" value="Menunggu Pembayaran" readonly/>
                              @elseif($tampil->statusverif==0 and $tampil->buktitransfer!='0')
                            <input type="text" class="form-control" name="hargabarang" value="Menunggu Verifikasi Admin" readonly/>
                              @else
                            <input type="text" class="form-control" name="hargabarang" value="Telah Diverifikasi" readonly/>
                              @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('jasapengiriman') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Jasa Pengiriman</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="hargabarang" value="{{$tampil->jasapengiriman}}" readonly/>
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('nomorresi') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nomor Resi</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="hargabarang" @if($tampil->resi=='') value="Belum Ada Resi" @else value="{{$tampil->resi}}" @endif readonly/>
                            </div>
                            </div>

                            @if($tampil->buktitransfer=='0' and $tampil->statusverif==0 and Auth::User()->level==2)
                            <form enctype="multipart/form-data" id="form" method="post" action="{{url('/submitbukti/'.$tampil->idpembelian)}}">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('buktipembayaran') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Pilih Bukti Pembayaran</label>
                            <div class="col-md-6">
                            <input type="file" accept="image/*" id="inputgambar" class="form-control" name="buktipembayaran" placeholder="Bukti Pembayaran" onchange="loadFile(event)" required/>
                            @if ($errors->has('buktipembayaran'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('buktipembayaran') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>
                            @endif

                            @if($tampil->buktitransfer=='0' and $tampil->statusverif==0)
                            @if($tampil->iduser==Auth::user()->id and Auth::User()->level==2)
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
                            @endif
                            @endif


                            <div class="modal fade" id="modalBatal" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Konfirmasi Pembatalan</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Anda hendak membatalkan pemesanan dengan ID Checkout {{$tampil->idpembelian}}.<br>
                                      Ingin melanjutkan?
                                  </div>
                                  <div class="modal-footer">
                                    <form id="deleteco" action="/undocheckout/{{$tampil->idpembelian}}" method="post">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="dlco" value="{{$tampil->idpembelian}}" />
                                    </form>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Urungkan</button> <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('deleteco').submit();">Lanjut Membatalkan</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endif

                            @if($loop->last)


                            <div class="form-group">
                            <div class="col-md-12 col-md-offset-0">
                              @if(Auth::User()->level==1 and $tampil->buktitransfer!='0' and $tampil->statusverif==0)
                                <a href="{{url('/verifikasi/'.$tampil->idpembelian)}}" class="btn btn-block btn-primary">Validasi</a>
                              @endif
                              @if(Auth::User()->level==1 and $tampil->buktitransfer!='0' and $tampil->statusverif==1)
                                <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#modalKirim">
                                    Update Resi
                                </button>

                                <div class="modal fade" id="modalKirim" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <form action="/updateresi/{{$tampil->idpembelian}}" method="post">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Input Resi</h4>
                                      </div>
                                      <div class="modal-body">

                                          {{csrf_field()}}
                                        <input type="text" name="nomorresi" class="form-control" placeholder="Nomor Resi" required></input>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Kirim</button> <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              @endif
                            </div>
                            </div>
                            @endif

                            @endforeach
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
