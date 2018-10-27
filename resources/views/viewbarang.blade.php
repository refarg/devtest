@extends('layouts.app')
@section('js')
<script src="{{asset('js/jquery.matchHeight-min.js')}}"></script>
<script>
$(function() {
    $(".btnsumbit").attr("disabled", false);
});
</script>
@endsection
@section('css')
<style type="text/css">
a{
  color: #000;
}
a:hover, a:focus{
  color: #000;
}
.desc{
  -ms-word-break: break-all;
  word-break: break-all;

  /* Non standard for webkit */
  word-break: break-word;

  -webkit-hyphens: auto;
  -moz-hyphens: auto;
  hyphens: auto;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Barang</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-stripped table-bordered">
                      <tr style='font-weight:bold;'>
  											<td class="text-center text-nowrap">Nama Barang</td>
  											<td class="text-center text-nowrap">Jenis Barang</td>
  											<td class="text-center text-nowrap">Deskripsi</td>
  											<td class="text-center text-nowrap">Stok</td>
  											<td class="text-center text-nowrap">Harga Barang</td>
                        <td class="text-center text-nowrap">Edit</td>
                        <td class="text-center text-nowrap">Hapus</td>
  										</tr>
                    @foreach($tampil as $data)
										<tr>
											<td class="desc"><a href="/viewbarang/{{$data->idbarang}}" title="Melihat Barang">{{$data->namabarang}}</a></td>
											<td class="text-center desc">{{$data->jenisbarang}}</td>
											<td class="desc">{{$data->deskripsi}}</td>
											<td class="text-center text-nowrap">{{$data->stok}}</td>
											<td class="text-center desc">{{$data->hargabarang}}</td>
                      <td class="text-center text-nowrap"><a href="/editbarang/{{$data->idbarang}}" class="btn btn-primary">Edit</a></td>
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                      <td class="text-center text-nowrap"><button data-toggle="modal" data-target="#modalHapus{{$loop->iteration}}" type="button" class="btnsumbit btn btn-danger">Hapus</a></button>
										</tr>
                    <div class="modal fade" id="modalHapus{{$loop->iteration}}" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                          </div>
                          <div class="modal-body">
                            <p>Anda hendak menghapus data dengan keterangan berikut:
                              <p>Nama Barang: {{$data->namabarang}}<br>Stok: {{$data->stok}} buah<br>Harga: Rp. {{number_format($data->hargabarang)}}</p>
                              Ingin melanjutkan?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button> <button type="button" class="btnsumbit btn btn-danger" onclick="location.href='/hapusbarang/{{$data->idbarang}}';">Hapus</button>
                          </div>
                        </div>
                      </div>
                    </div>
										@endforeach
                  </table>
                </div>
                <div class="text-center">
                {{ $tampil->links() }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
