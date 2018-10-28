@section('js')
<script src="{{asset('js/loadgam.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-latest.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$( ".form-dsbl" ).prop( "disabled", true );
});
$("#confirmedit").click(function(){
    $('#btnupdate').removeClass('hide');
    $('#confirmedit').addClass('hide');
    $( ".form-dsbl" ).prop( "disabled", false );
  });
</script>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data User : {{$edit->name}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="/updateuser/{{$edit->iduser}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                        <div class="col-md-12">

                          @if(is_null($edit->avatar))
                          <img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;" class="thumbnail img-responsive center-block" />
                          @elseif( $edit->avatar == '')
                          <img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;" class="img-responsive center-block thumbnail" />
                          @else
                          <img src="{{ asset('profileimage/'.$edit->avatar) }}" id="showgambar" alt="Gambar" style="max-width:200px;max-height:200px;" class="thumbnail img-responsive center-block" />
                          @endif

                            <p class="text-center" style="font-weight:bold;">Preview Gambar</p>
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                      <label for="text" class="col-md-4 control-label">Avatar</label>
                      <div class="col-md-6">
                      <input type="file" accept="image/*" id="inputgambar" class="form-control form-dsbl" name="avatar" placeholder="Avatar" onchange="loadFile(event)" />
                      @if ($errors->has('avatar'))
                          <span class="help-block">
                              <strong>{{ $errors->first('avatar') }}</strong>
                          </span>
                      @endif
                      </div>
                      </div>

                            <div class="form-group{{ $errors->has('namalengkap') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nama Lengkap</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control form-dsbl" name="namalengkap" value="{{$edit->namalengkap}}" />
                            @if ($errors->has('namalengkap'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('namalengkap') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control form-dsbl" name="alamat" value="{{$edit->alamat}}" />
                            @if ($errors->has('alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('nomorponsel') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Nomor Ponsel</label>
                            <div class="col-md-6">
                            <input type="number" min="0" class="form-control form-dsbl" name="nomorponsel" value="{{$edit->nomorponsel}}" />
                            @if ($errors->has('nomorponsel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nomorponsel') }}</strong>
                                </span>
                            @endif
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-12 col-md-offset-5">
                              <button type="button" id="confirmedit" class="btn btn-danger" @if(Auth::User()->level==1 and $edit->id!=Auth::User()->id) disabled @endif><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                <button type="button" class="btn hide btn-primary" id="btnupdate" data-toggle="modal" data-target="#modalEdit" @if(Auth::User()->level==1 and $edit->id!=Auth::User()->id) disabled @endif>
                                <i class="glyphicon glyphicon-save"></i> Update
                                </button>
                                <div class="modal fade" id="modalEdit" role="dialog">
                                  <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Konfirmasi Update</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Anda akan menyimpan data yang telah diedit. Lanjutkan?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button> <button class="btn btn-danger" type="submit">Simpan</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



    <!-- Modal content-->
@endsection
