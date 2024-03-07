@extends('layouts.app')

@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Profilo utente</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="icon-home"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card profile-header">
                        <div class="body text-center">
                            <div class="profile-image mb-3"><img src="{{asset($data->user_image)}}"
                                                                 class="rounded-circle" style="width: 200px; height: 200px;" alt=""></div>
                            <div>
                                <h4 class="mb-0"><strong>{{$data->first_name.' '.$data->last_name}}</strong></h4>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>Infoinformazioni</h2>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li><a href="javascript:void(0);" data-toggle="cardloading"
                                       data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <small class="text-muted">Indirizzo e-mail: </small>
                            <p>{{Auth::user()->email}}</p>
                            <hr>
                            <small class="text-muted">Telefono: </small>
                            <p>{{Auth::user()->phone_number}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs-new">
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Profile
                                        Modificare</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password">Resetta la password
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content padding-0">
                        <div class="tab-pane blog-page active" id="Overview">

                        </div>

                        <div class="tab-pane" id="profile">
                            <div class="card">
                                <div class="header bline">
                                    <h2>Informazioni generali
                                    </h2>
                                    <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                        <li><a href="javascript:void(0);" data-toggle="cardloading"
                                               data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                        <li><a href="javascript:void(0);" class="full-screen"><i
                                                    class="icon-size-fullscreen"></i></a></li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <form method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Nome di battesimo:</label>
                                                    <input type="text" name="first_name"
                                                           value="{{Auth::user()->first_name}}" class="form-control"
                                                           placeholder="Nome di battesimo
">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Cognome:</label>
                                                    <input type="text" name="last_name"
                                                           value="{{Auth::user()->last_name}}" class="form-control"
                                                           placeholder="Cognome">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Numero di telefono.:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fa fa-phone"></i></span>
                                                        </div>
                                                        <input type="text" name="phone"
                                                               value="{{Auth::user()->phone_number}}" class="form-control"
                                                               placeholder="Telefono">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Immagine dell'utente
                                                        :</label>
                                                    <input type="file" id="dropify-event-profile" name="user_image" data-default-file="{{Auth::user()->user_image}}">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-round">Aggiornamento</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="password">
                            <div class="card">
                                <div class="header bline">
                                    <h2>Cambia password</h2>
                                    <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                        <li><a href="javascript:void(0);" data-toggle="cardloading"
                                               data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                        <li><a href="javascript:void(0);" class="full-screen"><i
                                                    class="icon-size-fullscreen"></i></a></li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <form method="POST" action="{{ route('password.change') }}">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="password" name="oldPassword" class="form-control"
                                                           placeholder="password attuale">
                                                    @if($errors->has('oldPassword'))
                                                        <div class="error">{{ $errors->first('oldPassword') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="newPassword" class="form-control"
                                                           placeholder="nuova password">
                                                    @if($errors->has('newPassword'))
                                                        <div class="error">{{ $errors->first('newPassword') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="conformPassword"
                                                           class="form-control" placeholder="Conferma la nuova password">
                                                    @if($errors->has('conformPassword'))
                                                        <div
                                                            class="error">{{ $errors->first('conformPassword') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-round">Aggiornamento</button>
                                        &nbsp;&nbsp;
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{asset('vendor/dropify/css/dropify.min.css')}}">
@endpush
@push('script')
    <script src="{{asset('vendor/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('js/pages/forms/dropify.js')}}"></script>
@endpush
