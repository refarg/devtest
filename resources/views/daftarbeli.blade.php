@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Keranjang Belanja (Admin View)</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($tampil) > 0)
                    <table class="table table-stripped table-bordered">
                      <tr style='font-weight:bold;'>
                        <td class="text-center text-nowrap">Nama Barang</td>
  											<td class="text-center text-nowrap">Nama User</td>
  											<td class="text-center text-nowrap">Jumlah Barang</td>
                        <td class="text-center text-nowrap">Waktu Pembelian</td>
                        <td class="text-center text-nowrap">Total Bayar</td>
                        <td class="text-center text-nowrap">Batal Beli</td>
  										</tr>
                    @foreach($tampil as $data)
										<tr>
                      <td class="text-center text-nowrap">{{$data->namabarang}}</td>
											<td class="text-center text-nowrap">{{$data->name}}</td>
											<td class="text-center text-nowrap">{{$data->jumlahbarang}}</td>
                      <td class="text-center text-nowrap">{{$data->updated_at}}</td>
                      <td class="text-center text-nowrap">Rp. {{number_format($data->total)}}</td>
                      <td class="text-center text-nowrap"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBatal{{$loop->iteration}}">Batal Beli</button></td>
                    </tr>

                    <div class="modal fade" id="modalBatal{{$loop->iteration}}" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Konfirmasi Pembatalan</h4>
                          </div>
                          <div class="modal-body">
                            <p>Anda hendak membatalkan pembelian dengan rincian sebagai berikut:
                              <p>Nama Barang: {{$data->namabarang}}<br>Jumlah yang dipesan: {{$data->jumlahbarang}}<br>Total harus dibayar: Rp. {{number_format($data->total)}}</p>
                              Ingin melanjutkan?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Urungkan</button> <button type="button" class="btn btn-danger" onclick="location.href='/batalbelimod/{{$data->idpembelian}}';">Lanjut Membatalkan</button>
                          </div>
                        </div>
                      </div>
                    </div>
										@endforeach
                  </table>
                  @else
                  <h4 class="text-center">Tidak ada barang di dalam keranjang belanja semua user saat ini</h4>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
