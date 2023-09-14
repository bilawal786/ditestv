@extends('layouts.app')
@section('content')
    <?php
    $isChecked = 'yes';
    $Checked = 'yes'
    ?>
    <div id="main-content">
        @include('backend.users.includes.blockHeader')
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <h4>Edit New User</h4>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                            class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{--                            {!! Form::open(array('route' => 'users.edit',$user->id,'method'=>'POST')) !!}--}}
                            <form method="POST" action="{{route('users.update',[$user->id])}}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Nome:</strong>
                                            {!! Form::text('first_name',$user->first_name, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Cognome:</strong>
                                            {!! Form::text('last_name', $user->last_name, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Email:</strong>
                                            {!! Form::text('email', $user->email, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Numero Telefono:</strong>
                                            {!! Form::number('phone_number',$user->phone_number, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Residente</strong>
                                            <input type="text" name="resident" class="form-control" id=""
                                                   value="{{$user->resident}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Città:</strong>
                                            <input type="text" name="city" class="form-control" id=""
                                                   value="{{$user->city}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Provincia:</strong>
                                            <input type="text" name="province" class="form-control" id=""
                                                   value="{{$user->province}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>CAP</strong>
                                            <input type="number" name="postal_code" class="form-control" id=""
                                                   value="{{$user->postal_code}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Numero di licenza</strong>
                                            <input type="number" name="license_number" class="form-control" id=""
                                                   value="{{$user->license_number}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Data di Nascita</strong>
                                            <input type="date" name="d_o_b" class="form-control" id=""
                                                   value="{{$user->d_o_b}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Luogo di Nascita:</strong>
                                            <input type="text" name="birth_place" class="form-control" id=""
                                                   value="{{$user->birth_place}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Rilasciata il:</strong>
                                            <input type="text" name="released_on" class="form-control" id=""
                                                   value="{{$user->released_on}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza prova di sgancio:</strong>
                                            <input type="date" name="release_test_deadline" class="form-control" id=""
                                                   value="{{$user->release_test_deadline}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza attività minima:</strong>
                                            <input type="date" name="minimum_activity_deadline" class="form-control"
                                                   id=""
                                                   value="{{$user->minimum_activity_deadline}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Compagnia assicuratva</strong>
                                            <input type="text" name="insurance_company" class="form-control" id=""
                                                   value="{{$user->insurance_company}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza assicurazione:</strong>
                                            <input type="date" name="insurance_expiration" class="form-control" id=""
                                                   value="{{$user->insurance_expiration}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza visita medica</strong>
                                            <input type="date" name="medical_examination_deadline" class="form-control"
                                                   id="" value="{{$user->medical_examination_deadline}}"
                                                   data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Paese:</strong>
                                            <input type="text" name="village" class="form-control" id=""
                                                   value="{{$user->village}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza per il rimborso di emergenza</strong>
                                            <input type="date" name="expiry_date" class="form-control" id=""
                                                   value="{{$user->expiry_date}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Contatto emergenza:</strong>
                                            <input type="text" name="emergency_contact" class="form-control" id=""
                                                   value="{{$user->emergency_contact}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Grado del contatto:</strong>
                                            <input type="text" name="degree_of_contact" class="form-control" id=""
                                                   value="{{$user->degree_of_contact}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="form-check-label mr-5" for="exampleCheck1">Allievo:</label>
                                            <input type="checkbox" name="student" class="form-check-input"
                                                   id="exampleCheck1" value="{{$user->student}}" data-default-file=""
                                                   @if($user->student === 'yes')checked @endif
                                            >
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="form-check-label mr-5" for="exampleCheck1">Possiede il
                                                materiale:</label>
                                            <input type="checkbox" class="form-check-input"
                                                   value="{{$user->own_material}}"
                                                   id="exampleCheck1"
                                                   name="own_material"
                                                   data-default-file=""
                                            @if($user->own_material === 'yes')checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary btn-round">Submit</button>
                                    </div>
                                </div>
                            </form>
                            {{--                            {!! Form::close() !!}--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
