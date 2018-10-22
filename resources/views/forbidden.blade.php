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

                    Maaf, anda tidak dapat mengakses fitur tersebut.<br>Penyebab anda melihat halaman ini mungkin adalah sebagai berikut:<br>- Mencoba akses halaman admin<br>- Mengubah detail pengguna ketika memiliki pemesanan yang belum diverifikasi oleh admin<br>- Fitur belum tersedia<br>- Sistem error<br>Jika anda tidak dikembalikan ke tampilan home dalam 10 detik, mohon <a href="/home">klik disini</a>.
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        window.setTimeout(function () {
            window.location = "/home";
        }, 10000);
    </script>
@endsection
