@extends('layouts.app')

@section('componentcss')
<style>
DIV.table
{
    display:table;
}
FORM.tr, DIV.tr
{
    display:table-row;
}
SPAN.td
{
    display:table-cell;
}
</style>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                        <td class="col-xs-2 text-center text-nowrap">Nama Barang</td>
                        <td class="col-xs-2 text-center text-nowrap">Jenis Barang</td>
                        <td class="col-xs-2 text-center text-nowrap">Deskripsi</td>
                        <td class="col-xs-2 text-center text-nowrap">Stok</td>
                        <td class="col-xs-2 text-center text-nowrap">Harga Barang</td>
                        <td class="col-xs-7 text-center text-nowrap">Stok yang diinginkan</td>
                        <td class="col-xs-1 text-center text-nowrap">Beli Barang</td>
                      </tr>
                  </table>
                      @foreach($tampil as $data)
                          <form class="tr" method="post" action="/belibarang/{{$data->idbarang}}">
                            {{ csrf_field() }}
                            <table class="table">
                              <tr>
                            <td class="col-xs-2 text-center text-nowrap">{{$data->namabarang}}</td>
      											<td class="col-xs-2 text-center text-nowrap">{{$data->jenisbarang}}</td>
      											<td class="col-xs-2 text-center text-nowrap">{{$data->deskripsi}}</td>
      											<td class="col-xs-2 text-center text-nowrap">{{$data->stok}}</td>
      											<td class="col-xs-2 text-center text-nowrap">{{$data->hargabarang}}</td>
                            <td class="col-xs-7 text-center text-nowrap"><input type="text" class="form-control" name="jumlahbarang" placeholder="Jumlah Barang"/></td>
                            <td class="col-xs-1 text-center text-nowrap"><button type="submit" class="btn btn-primary">Beli Barang</button></td>
                            <input type="hidden" class="form-control" name="idbarang" value="{{$data->idbarang}}" readonly/>
                          </tr>
                        </table>
                          </form>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
