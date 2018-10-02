@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
                    <p><a class="btn btn-default" href="/viewbarang">Lihat Barang (List)</a></p>
                    <p><a class="btn btn-success" href="/viewbarangmod">Lihat Barang (Grid)</a></p>
                    <p><a class="btn btn-warning" href="/viewbarangm">Lihat Barang sebagai user</a></p>
                    <p><a class="btn btn-info" href="/listpembelian">Lihat Barang yang Dibeli</a></p>
                    <p><a class="btn btn-danger" href="/viewuserlist">Lihat User Terdaftar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
