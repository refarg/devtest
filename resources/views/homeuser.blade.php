@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-3">
                      <div class="panel panel-default">
                        <div class="panel-heading">Menu</div>
                          <div class="panel-body">
                              <div class="list-group">
                                  <a href="/viewbarang" class="list-group-item">Lihat Semua Barang</a>
                                  <a href="/listcheckout" class="list-group-item">Lihat Barang dipesan</a>
                                  <a href="/listbeli" class="list-group-item">Keranjang Belanja</a>
                                  <a href="/viewuser" class="list-group-item">Lihat Profil Pengguna</a>
                              </div>
                            </div>
                      </div>
      </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Anda masuk sebagai {{ Auth::user()->name }}!<br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
