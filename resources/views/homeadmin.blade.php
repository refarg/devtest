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
<link href="" rel="stylesheet">
@endsection
@section('content')

<div class="container">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>You are logged in as {{ Auth::user()->name }}!</h1>
                    <p><a class="btn btn-primary" href="/registbarang">Registrasi Barang</a></p>
                    <p><a class="btn btn-default" href="/viewbarangm">Lihat Barang (List)</a></p>
                    <p><a class="btn btn-success" href="/viewbarangmod">Lihat Barang (Grid)</a></p>
                    <p><a class="btn btn-warning" href="/viewbarang">Lihat Barang sebagai user</a></p>
                    <p><a class="btn btn-info" href="/listpembelian">Lihat Barang yang Dibeli</a></p>
                    <p><a class="btn btn-danger" href="/viewuserlist">Lihat User Terdaftar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
