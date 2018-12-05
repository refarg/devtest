@section('js')
<script src="{{asset('js/jquery.matchHeight-min.js')}}"></script>
<script type="text/javascript">
$('.carousel[data-type="multi"] .item').each(function() {
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

	for (var i = 0; i < 2; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}

		next.children(':first-child').clone().appendTo($(this));
	}
});
$(document).ready(function() {
  $('.box').matchHeight();
  $('.cap').matchHeight();
});
</script>
@endsection
@section('css')
<style type="text/css">
@media only screen and (max-width : 767px) {
    .box {
        height: auto !important;
    }
}
.thumbnail img {
    height:250px;
    width:100%;
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

.col-centered {
    float: none;
    margin: 0 auto;
}

.carousel-control {
    width: 8%;
    width: 0px;
}
.carousel-control.left,
.carousel-control.right {
    margin-right: 40px;
    margin-left: 32px;
    background-image: none;
    opacity: 1;
}
.carousel-control > a > span {
    color: white;
	  font-size: 29px !important;
}

.carousel-col {
    position: relative;
    min-height: 1px;
    padding: 5px;
    float: left;
 }

 .active > div { display:none; }
 .active > div:first-child { display:block; }

/*xs*/
@media (max-width: 767px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
	.carousel-inner .next        { left:  50%; }
	.carousel-inner .prev		     { left: -50%; }
  .carousel-col                { width: 50%; }
	.active > div:first-child + div { display:block; }
}

/*sm*/
@media (min-width: 768px) and (max-width: 991px) {
  .carousel-inner .active.left { left: -50%; }
  .carousel-inner .active.right { left: 50%; }
	.carousel-inner .next        { left:  50%; }
	.carousel-inner .prev		     { left: -50%; }
  .carousel-col                { width: 50%; }
	.active > div:first-child + div { display:block; }
}

/*md*/
@media (min-width: 992px) and (max-width: 1199px) {
  .carousel-inner .active.left { left: -33%; }
  .carousel-inner .active.right { left: 33%; }
	.carousel-inner .next        { left:  33%; }
	.carousel-inner .prev		     { left: -33%; }
  .carousel-col                { width: 33%; }
	.active > div:first-child + div { display:block; }
  .active > div:first-child + div + div { display:block; }
}

/*lg*/
@media (min-width: 1200px) {
  .carousel-inner .active.left { left: -25%; }
  .carousel-inner .active.right{ left:  25%; }
	.carousel-inner .next        { left:  25%; }
	.carousel-inner .prev		     { left: -25%; }
  .carousel-col                { width: 25%; }
	.active > div:first-child + div { display:block; }
  .active > div:first-child + div + div { display:block; }
	.active > div:first-child + div + div + div { display:block; }
}

.block {
	width: 306px;
	height: 230px;
}

</style>
@endsection
@extends('layouts.app')
@section('content')

<div class="container">
  <div class="panel panel-default">
      <div class="panel-heading">Rekomendasi Barang</div>

      <div class="panel-body">
        <div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="5000">
				<div class="carousel-inner">
          @if(count($recom)==0)
          Belum ada rekomendasi barang
          @else
          @foreach($recom as $recc)
            <div class="item @if($loop->first) active @endif">
              <div class="carousel-col">
              <div class="img-responsive thumbnail box">
              @if(is_null($recc->gambarbarang))
              <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY2MmRiMTU5ODYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjYyZGIxNTk4NiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS41IiB5PSIxMDUuNyI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="Gambar">
              @elseif( $recc->gambarbarang == '')
              <img  src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY2MmRiMTU5ODYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjYyZGIxNTk4NiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS41IiB5PSIxMDUuNyI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="..." />
              @else
              <img class="" src="{{ asset('image/'.$recc->gambarbarang) }}" alt="..."/>
              @endif

              <div class="carousel-caption">
                <h4 class="desc">{{$recc->namabarang}}</h4>
                <a href="/viewbarang/{{$recc->idbarang}}" title="Lihat {{$recc->namabarang}}" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-info-sign"></i> Lihat Detail Barang</a>
              </div>
            </div>
          </div>
        </div>
          @endforeach
          @endif
				</div>

				<!-- Controls -->
				<div class="left carousel-control">
					<a href="#carousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
				</div>
				<div class="right carousel-control">
					<a href="#carousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
</div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Barang</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="row">
@if(count($tampil)==0)
<div class="col-sm-6 col-md-4">
Tidak ada Data Barang
</div>
@else
@foreach($tampil as $data)
<div class="col-sm-6 col-md-4">
  {{ csrf_field() }}
    <div class="thumbnail box">
      @if(is_null($data->gambarbarang))
      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY2MmRiMTU5ODYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjYyZGIxNTk4NiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS41IiB5PSIxMDUuNyI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="Gambar">
      @elseif( $data->gambarbarang == '')
      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTY2MmRiMTU5ODYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNjYyZGIxNTk4NiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS41IiB5PSIxMDUuNyI+MjQyeDIwMDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" alt="..." />
      @else
      <img src="{{ asset('image/'.$data->gambarbarang) }}" alt="..." />
      @endif
      <div class="caption cap">
        <h3>{{$data->namabarang}}</h3>
        <p>Jenis: {{$data->jenisbarang}}</p>
        <p class="desc">Deskripsi: {{$data->deskripsi}}</p>
        <p>Stok: {{$data->stok}} buah</p>
        <p>Harga: Rp. {{number_format($data->hargabarang)}}</p>
      </div>
      <a href="/viewbarang/{{$data->idbarang}}" title="Lihat {{$data->namabarang}}" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-info-sign"></i> Lihat Barang</a>
    </div>
</div>
@endforeach
@endif
</div>

                    </div>

                      <div class="text-center">
                      {{ $tampil->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
