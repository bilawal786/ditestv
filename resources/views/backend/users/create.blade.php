@extends('layouts.app')
@section('content')
    <?php
    $isChecked = 'yes';
    $Checked = 'yes'
    ?>
    <style>
        /* Customize the checkbox size */
        .form-check-input[type="checkbox"] {
            width: 10px; /* Adjust the width */
            height: 10px; /* Adjust the height */
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 24px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div id="main-content">
        @include('backend.users.includes.blockHeader')
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <h4>Crea Nuovo Utente</h4>
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
                            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Nome :</strong>
                                        {!! Form::text('first_name', old('first_name'), array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Cognome :</strong>
                                        {!! Form::text('last_name',  old('last_name'), array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Email :</strong>
                                        {!! Form::text('email', old('email'), array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Numero Telefono :</strong>
                                        {!! Form::number('phone_number', old('phone_number'), array('class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Residente : </strong>
                                        <input type="text" name="resident" value="{{old('resident')}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Città :</strong>
                                        <input type="text" name="city" class="form-control" id=""
                                               value="{{old('city')}}" data-default-file="">
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Provincia :</strong>
                                        <input type="text" name="province" class="form-control" id=""
                                               value="{{old('province')}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>CAP :</strong>
                                        <input type="number" name="postal_code" class="form-control" id=""
                                               value="{{old('postal_code')}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Numero di licenza :</strong>
                                        <input type="number" name="license_number" class="form-control" id=""
                                               value="{{old('license_number')}}" data-default-file="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Data di Nascita :</strong>
                                        <input type="date" name="d_o_b" class="form-control" id=""
                                               value="{{old('d_o_b')}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Luogo di Nascita :</strong>
                                        <input type="text" name="birth_place" class="form-control" id=""
                                               value="{{old('birth_place')}}" data-default-file="">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Rilasciata il :</strong>
                                        <input type="text" name="released_on" class="form-control" id=""
                                               value="{{old('released_on')}}" data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza prova di sgancio :</strong>
                                        <input type="date" name="release_test_deadline" class="form-control" id=""
                                               value="{{old('release_test_deadline')}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza attività minima :</strong>
                                        <input type="date" name="minimum_activity_deadline" class="form-control" id=""
                                               value="{{old('minimum_activity_deadline')}}" data-default-file="">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Compagnia assicuratva :</strong>
                                        <input type="text" name="insurance_company" class="form-control" id=""
                                               value="{{old('insurance_company')}}" data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza assicurazione :</strong>
                                        <input type="date" name="insurance_expiration" class="form-control" id=""
                                               value="{{old('insurance_expiration')}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza visita medica :</strong>
                                        <input type="date" name="medical_examination_deadline" class="form-control"
                                               id="" value="{{old('medical_examination_deadline')}}"
                                               data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Paese :</strong>
                                        <input type="text" name="village" value="{{old('village')}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza per il rimborso di emergenza :</strong>
                                        <input type="date" name="expiry_date" value="{{old('expiry_date')}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Contatto emergenza :</strong>
                                        <input type="text" name="emergency_contact" value="{{old('emergency_contact')}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Grado del contatto :</strong>
                                        <input type="text" name="degree_of_contact" value="{{old('degree_of_contact')}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="form-check-label mr-4 font-5"
                                               for="exampleCheck1">Allievo :</label>
                                        <div>
                                        <label class="switch">
                                            <input type="checkbox" name="student" class="form-check-input"
                                                   id="exampleCheck1" data-default-file="">
                                            <?php if ($Checked == 'yes'): ?><?php endif; ?>
                                            <span class="slider round"></span>
                                        </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="form-check-label mr-3 font-5 "
                                               for="exampleCheck1">Possiede il materiale :</label>
                                        <div class="">
                                        <label class="switch">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                   name="own_material" data-default-file=""
                                                <?php if ($isChecked == 'yes'): ?><?php endif; ?>>
                                            <span class="slider round"></span>
                                        </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary btn-round">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
