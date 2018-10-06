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

                    Unknown territory, retreating....<br>If you are not redirected to dashboard after 5 seconds,<br>please <a href="/home">click here</a>.
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        window.setTimeout(function () {
            window.location = "/home";
        }, 5000);
    </script>
@endsection
