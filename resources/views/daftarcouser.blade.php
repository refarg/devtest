@extends('layouts.app')
@section('css')
<style type="text/css">
.file {
  position: relative;
  overflow: hidden;
}
.iform {
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}
a{
  color: #000;
}
a:hover, a:focus{
  color: #000;
}
</style>
@endsection
@section('js')
<script>
document.getElementById("upload").onchange = function() {
    document.getElementById("form").submit();
}
</script>
@endsection
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-body">
              Pembayaran dapat dilakukan melalui transfer ke rekening:<br>
              Bank ATM<br>
              A/N Joseph Christian Saragih<br>
              Nomor Rekening: 182938218392
            </div>
          </div>
        </div>
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Checkout {{ Auth::user()->name }}</div>

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
                        <td class="text-center text-nowrap">Status Verif.</td>
                        <td class="text-center text-nowrap">Bukti Pembayaran</td>
  										</tr>
                      @php
                      $store = '';
                      @endphp
                    @foreach($tampil as $data)
										<tr>
                      @if($data->idpembelian==$store)
                      <td class="text-center text-nowrap" style="border-top:0;border-bottom:0;"></td>
                      @else
                      <td class="text-center text-nowrap" style="border-bottom:0;"><a href="/listcheckout/detail/{{$data->idpembelian}}" title="Lihat Detail Pembelian">{{$data->idpembelian}}</a></td>
                      @endif

                      @if($data->buktitransfer=='0')
                      <td class="text-center text-nowrap">Menunggu Pembayaran</td>
                      @if($data->idpembelian==$store)
                      <td class="text-center text-nowrap" style="border-bottom:0;border-top:0;"></td>
                      @else
                      <td class="text-center text-nowrap" style="border-bottom:0;">
                        <form enctype="multipart/form-data" id="form" method="post" action="{{url('/submitbukti/'.$data->idpembelian)}}">
                        {{csrf_field()}}
                        <div class="file btn btn-primary">
                          <i class="glyphicon glyphicon-upload"></i> Pilih Foto
                          <input class="iform" id="upload" type="file" name="buktipembayaran" accept="image/*" required />
                        </div>
                      </form></td>
                      @endif

                      @elseif($data->statusverif!=0 or $data->resi!='')
                      <td class="text-center text-nowrap" >Telah diverifikasi admin</td>
                      @if($data->idpembelian==$store)
                      <td class="text-center text-nowrap" style="border-top:0;"></td>
                      @else
                      <td class="text-center text-nowrap" style="border-bottom:0;border-top:0;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalView{{$loop->iteration}}">Lihat Gambar</button></td>
                      @endif
                      @else
                      <td class="text-center text-nowrap" >Menunggu Verifikasi Admin</td>
                      @if($data->idpembelian==$store)
                      <td class="text-center text-nowrap" style="border-top:0;"></td>
                      @else
                      <td class="text-center text-nowrap" style="border-bottom:0;border-top:0;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalView{{$loop->iteration}}">Lihat Gambar</button></td>
                      @endif
                      @endif

										</tr>

                    @if($data->buktitransfer!='0')
                    <div class="modal fade" id="modalView{{ $loop->iteration }}" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Bukti Pembayaran</h4>
                          </div>
                          <div class="modal-body">
                            <p><img class="img-responsive thumbnail center-block" src="{{ asset('buktitrf/'.$data->buktitransfer) }}" /></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @php
                    $store = $data->idpembelian;
                    @endphp
										@endforeach
                  </table>
                  @else
                  <h4 class="text-center">Tidak ada barang di dalam keranjang checkout saat ini</h4>
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
