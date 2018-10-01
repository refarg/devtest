@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Barang dibeli</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-stripped table-bordered">
                      <tr style='font-weight:bold;'>
  											<td class="text-center text-nowrap">ID Barang</td>
                        <td class="text-center text-nowrap">Nama Barang</td>
  											<td class="text-center text-nowrap">Nama User</td>
  											<td class="text-center text-nowrap">Jumlah Barang</td>
                        <td class="text-center text-nowrap">Waktu Pembelian</td>
  										</tr>
                    @foreach($tampil as $data)
										<tr>
											<td class="text-center text-nowrap">{{$data->idbarang}}</td>
                      <td class="text-center text-nowrap">{{$data->namabarang}}</td>
											<td class="text-center text-nowrap">{{$data->name}}</td>
											<td class="text-center text-nowrap">{{$data->jumlahbarang}}</td>
                      <td class="text-center text-nowrap">{{$data->created_at}}</td>
										</tr>
										@endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
