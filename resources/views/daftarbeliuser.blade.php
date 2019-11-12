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
$(document).ready(function(){
  $('#checkAll').on('click', function(e) {
      var checkbox = $("input.checkinput");
      checkbox.prop('checked', !checkbox.prop('checked'))
      if(checkbox.prop('checked')){
          $('#checkAll').attr('value','Uncheck All');
      }
      else{
        $('#checkAll').attr('value','Check All');
      }


});

});

function checkChecked(formname) {
        if ($('input[name="checko[]"]:checked').length > 0) {
          } else {
                  alert("Mohon pilih barang yang akan di-checkout");
                    event.preventDefault();
            }
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
                <div class="panel-heading">Keranjang Belanja {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($tampil) > 0)
                    <form class="form" id="theform" action="{{route('checkout')}}" method="post" onsubmit="return checkChecked('theform');">
                      {{csrf_field()}}
                    <table class="table table-responsive table-stripped table-bordered">
                      <tr style='font-weight:bold;'>
                        <td class="text-center">ID Keranjang</td>
                        <td class="text-center">Nama Barang</td>
  											<td class="text-center">Jumlah Barang</td>
                        <td class="text-center">Waktu Pembelian</td>
                        <td class="text-center">Total Bayar</td>
                        <td class="text-center"><input type="button" id="checkAll" class="btn btn-primary" value="Check All"/></td>
  										</tr>

                    @foreach($tampil as $data)
										<tr>
                      <td class="text-center"><a href="/listbeli/detail/{{$data->idpembelian}}" title="Lihat Detail Pembelian">{{$data->idpembelian}}</a></td>
                      <td class="text-center"><a href="/viewbarang/{{$data->idbarang}}" title="Lihat Detail Barang">{{$data->namabarang}}</a></td>
											<td class="text-center">{{$data->jumlahbarang}}</td>
                      <td class="text-center">{{ Carbon\Carbon::parse($data->created_at)->formatLocalized('%A, %d %B %Y %H:%I:%S')}}</td>
                      <td class="text-center">Rp. {{number_format($data->total)}}</td>
                      <td class="text-center"><input class="checkinput" type="checkbox" name="checko[]" value="{{$data->idpembelian}}"></td>
										</tr>
										@endforeach
                  </table>

                    <div class="form-inline col-md-offset-4">
                      <div class="form-group mb-2">
                        <select class="form-control" name="jasapengiriman" required>
                        <option value="" disabled="" selected="">Pilih Jasa Pengiriman</option>
                        <option value="JNE">JNE</option>
                        <option value="J&T">J&T</option>
                        <option value="Pos Indonesia">Pos Indonesia</option>
                        <option value="TIKI">TIKI</option>
                        </select>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                      <input class="btn btn-primary" id="checkoutbtn" type="submit" value="Checkout">
                      </div>
                    </div>
                  </form>
                  @else
                  <h4 class="text-center">Tidak ada barang di dalam keranjang belanja saat ini</h4>
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
