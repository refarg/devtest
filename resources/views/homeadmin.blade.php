@extends('layouts.app')
@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#menu").click(function(e) {
          e.preventDefault();
        $("#container").toggleClass("toggled");
        });
    });
</script>
@endsection
@section('css')
<style type="text/css">
.blue{
  background-color:#3097D1;
}
.green{
  background-color:#2ab27b;
}
</style>
@endsection
@section('content')

<div class="container">
  <div class="col-sm-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                      <div class="panel-body">
                          <div class="list-group">
                              <a href="/viewbarang" class="list-group-item">Lihat Barang</a>
                              <a href="/viewbarangmod" class="list-group-item">Kelola Barang</a>
                              <a href="/viewbarangm" class="list-group-item">Kelola Barang (Tabel)</a>
                              <a href="/listpembelian" class="list-group-item">Kelola Pemesanan</a>
                              <a href="/viewuserlist" class="list-group-item">Lihat Daftar Pengguna</a>
                          </div>
                        </div>
                  </div>
  </div>
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel panel-default" style="border:0;">
                    <div class="panel-body">
                    <h4>Anda telah masuk sebagai {{ Auth::user()->name }}!</h4>
                    </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel panel-default blue">
                        <div class="panel-body">
                          Jumlah Barang Teregistrasi: {{$totalbarang}}
                          <br>Total Stok Barang: {{$barang->totalstok}}
                          <br>Total Harga Barang (Satuan): Rp. {{number_format($barang->totalharga)}}
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="panel panel-default green">
                        <div class="panel-body">
                          Jumlah Pesanan: {{$totalbeli}}<br>
                          Pemesanan Menunggu Verifikasi: <a href="/listpembelian" title="Lihat Pesanan Masuk" style="color:white">{{$pembelian}}</a><br>
                          Total Uang Masuk (Terverifikasi): Rp. {{number_format($money->total)}}
                        </div>
                      </div>
                    </div>

                </div>
                <div class="panel-footer text-right">
                  Data Update per {{ Carbon\Carbon::parse(Carbon\Carbon::now())->formatLocalized('%A, %d %B %Y %H:%I:%S')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
