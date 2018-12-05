@extends('layouts.app')
@section('css')
<style type="text/css">
a{
  color: #000;
}
a:hover, a:focus{
  color: #000;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Pembelian</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($tampil) > 0)
                    <table class="table table-stripped table-bordered">
                      <tr style='font-weight:bold;'>
                        <td class="text-center text-nowrap">ID Pembelian</td>
                        <td class="text-center text-nowrap">ID Barang</td>
  											<td class="text-center text-nowrap">Nama Pembeli</td>
  											<td class="text-center text-nowrap">Jumlah Barang</td>
                        <td class="text-center text-nowrap">Waktu Pembelian</td>
                        <td class="text-center text-nowrap">Total Bayar</td>
                        <td class="text-center text-nowrap">Jasa Pengiriman</td>
                        <td class="text-center text-nowrap">Status Verifikasi</td>
                        <td class="text-center text-nowrap">Bukti Transfer</td>
                        <td class="text-center text-nowrap">Nomor Resi</td>
  										</tr>
                    @foreach($tampil as $data)
										<tr>
                      <td class="text-center text-nowrap"><a href="/listbeli/detail/{{$data->idpembelian}}" title="Lihat Barang">{{$data->idpembelian}}</a></td>
                      <td class="text-center text-nowrap"><a href="/viewbarang/{{$data->idbarang}}" title="Lihat Barang">{{$data->idbarang}}</a></td>
											<td class="text-center text-nowrap">{{$data->namalengkap}}</td>
											<td class="text-center text-nowrap">{{$data->jumlahbarang}}</td>
                      <td class="text-center text-nowrap">{{ Carbon\Carbon::parse($data->created_at)->formatLocalized('%d %B %Y %H:%I:%S')}}</td>
                      <td class="text-center text-nowrap">Rp. {{number_format($data->total)}}</td>
                      <td class="text-center text-nowrap">{{$data->jasapengiriman}}</td>
                      @if($data->buktibayar=='')
                      <td class="text-center text-nowrap">Belum Verifikasi</td>
                      <td class="text-center text-nowrap">Kosong</td>
                      <td class="text-center text-nowrap">Kosong</td>
                      @elseif($data->statusverif==0)
                      <td class="text-center text-nowrap">Menunggu Verifikasi</td>
                      <td class="text-center text-nowrap"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalView{{$loop->iteration}}">Lihat Gambar</button></td>
                      <td class="text-center text-nowrap"><a href="{{url('/verifikasi/'.$data->idpembelian)}}" class="btn btn-primary">Validasi</a></td>
                      @else
                      <td class="text-center text-nowrap">Telah Diverifikasi</td>
                      <td class="text-center text-nowrap"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalView{{$loop->iteration}}"><i class="glyphicon glyphicon-zoom-in"></i></button></td>
                      @if($data->resi=='')
                      <td class="text-center text-nowrap"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKirim{{$loop->iteration}}"><i class="glyphicon glyphicon-edit"></i></button></td>
                      @else
                      <td class="text-center text-nowrap">{{$data->resi}}</td>
                      @endif
                      @endif
                    </tr>

                    @if($data->buktibayar!='')
                    <div class="modal fade" id="modalView{{ $loop->iteration }}" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Bukti Pembayaran</h4>
                          </div>
                          <div class="modal-body">
                            <p><img class="img-responsive thumbnail center-block" src="{{ asset('buktitrf/'.$data->buktibayar) }}" /></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif

                    @if($data->statusverif!=0&&$data->buktibayar!='')
                    <div class="modal fade" id="modalKirim{{ $loop->iteration }}" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Input Resi</h4>
                          </div>
                          <div class="modal-body">
                            <form action="/updateresi/{{$data->idpembelian}}" method="post">
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

										@endforeach
                  </table>
                  @else
                  <h4 class="text-center">Tidak ada barang di dalam keranjang belanja semua user saat ini</h4>
                  @endif
                </div>
                <div class="text-center">
                {{ $tampil->links() }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
