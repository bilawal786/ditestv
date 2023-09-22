@extends('layouts.app')

@section('content')
    <style>
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
                            <h4>Dettagli Cliente</h4>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                            class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Nome :</strong>
                                        <input type="text" readonly value="{{$user->first_name}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Cognome :</strong>
                                        <input type="text" readonly value="{{$user->last_name}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Email :</strong>
                                        <input type="text" readonly value="{{$user->email}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Numero Telefono :</strong>
                                        <input type="text" readonly value="{{$user->phone_number}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Residente : </strong>
                                        <input type="text" name="resident" readonly value="{{$user->resident}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Città :</strong>
                                        <input type="text" name="city" readonly class="form-control" id=""
                                               value="{{$user->city}}" data-default-file="">
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Provincia :</strong>
                                        <input type="text" name="province" readonly class="form-control" id=""
                                               value="{{$user->province}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>CAP :</strong>
                                        <input type="number" name="postal_code" readonly class="form-control" id=""
                                               value="{{$user->postal_code}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Numero di licenza :</strong>
                                        <input type="text" name="license_number" readonly class="form-control" id=""
                                               value="{{$user->license_number}}" data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Data di Nascita :</strong>
                                        <input type="date" name="d_o_b" readonly class="form-control" id=""
                                               value="{{$user->d_o_b}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Luogo di Nascita :</strong>
                                        <input type="text" name="birth_place" readonly class="form-control" id=""
                                               value="{{$user->birth_place}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Rilasciata il :</strong>
                                        <input type="text" name="released_on" readonly class="form-control" id=""
                                               value="{{$user->released_on}}" data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza prova di sgancio :</strong>
                                        <input type="date" name="release_test_deadline" readonly class="form-control"
                                               id=""
                                               value="{{$user->release_test_deadline}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza attività minima :</strong>
                                        <input type="date" name="minimum_activity_deadline" readonly
                                               class="form-control" id=""
                                               value="{{$user->minimum_activity_deadline}}" data-default-file="">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Compagnia assicuratva :</strong>
                                        <input type="text" name="insurance_company" readonly class="form-control" id=""
                                               value="{{$user->insurance_company}}" data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza assicurazione :</strong>
                                        <input type="date" name="insurance_expiration" readonly class="form-control"
                                               id=""
                                               value="{{$user->insurance_expiration}}" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza visita medica :</strong>
                                        <input type="date" name="medical_examination_deadline" readonly
                                               class="form-control"
                                               id="" value="{{$user->medical_examination_deadline}}"
                                               data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Paese :</strong>
                                        <input type="text" name="village" readonly value="{{$user->village}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Scadenza per il rimborso di emergenza :</strong>
                                        <input type="date" name="repayment_expiry_date" readonly
                                               value="{{$user->repayment_expiry_date}}"
                                               class="form-control"
                                               data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Rimborso d'emergenza :</strong>
                                        <input type="text" name="emergency_repayment_date" readonly
                                               value="{{$user->emergency_repayment_date}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Grado del contatto :</strong>
                                        <input type="text" name="degree_of_contact" readonly
                                               value="{{$user->degree_of_contact}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Contatto Di Emergenza :</strong>
                                        <input type="text" name="emergency_phone_number" readonly
                                               value="{{$user->emergency_phone_number}}"
                                               class="form-control" id=""
                                               data-default-file="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="form-check-label mr-5" for="exampleCheck1">Allievo :</label>
                                        <label class="switch">
                                            <input type="checkbox" name="student" class="form-check-input"
                                                   id="exampleCheck1" value="{{$user->student}}"
                                                   data-default-file=""
                                                   @if($user->student === 'yes')checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="form-check-label mr-5" for="exampleCheck1">Possiede il
                                            materiale :</label>
                                        <label class="switch">
                                            <input type="checkbox" class="form-check-input"
                                                   value="{{$user->own_material}}"
                                                   id="exampleCheck1"
                                                   name="own_material"
                                                   data-default-file=""
                                                   @if($user->own_material === 'yes')checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group d-flex">
                                        <label class="form-check-label mr-5" for="exampleCheck1">E-mail automatica
                                            :</label>
                                        <label class="switch">
                                            <input type="checkbox" name="send_auto_email" class="form-check-input"
                                                   id="exampleCheck1" value="{{$user->send_auto_email}}"
                                                   data-default-file=""
                                                   @if($user->send_auto_email === 'yes')checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
