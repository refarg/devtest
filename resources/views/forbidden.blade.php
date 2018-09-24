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

                    Admin-only area<br>If you are not redirected within 5 seconds,<br>please <a href="/">click here</a>.
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        window.setTimeout(function () {
            window.location = "/";
        }, 5000);
    </script>
@endsection
