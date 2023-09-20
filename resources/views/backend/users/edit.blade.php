@extends('layouts.app')
@section('content')
    <?php
    $isChecked = 'yes';
    $Checked = 'yes'
    ?>

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
                            <h4>Modifica Nuovo Utente</h4>
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
                                            <strong>Nome :</strong>
                                            {!! Form::text('first_name',$user->first_name, array('class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Cognome :</strong>
                                            {!! Form::text('last_name', $user->last_name, array('class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Email :</strong>
                                            {!! Form::text('email', $user->email, array('class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Numero Telefono :</strong>
                                            {!! Form::number('phone_number',$user->phone_number, array('class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Residente :</strong>
                                            <input type="text" required name="resident" class="form-control" id=""
                                                   value="{{$user->resident}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Città :</strong>
                                            <input type="text" required name="city" class="form-control" id=""
                                                   value="{{$user->city}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Provincia :</strong>
                                            <input type="text" required name="province" class="form-control"
                                                   value="{{$user->province}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>CAP :</strong>
                                            <input type="number" required name="postal_code" class="form-control"
                                                   value="{{$user->postal_code}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group" id="license_number">
                                            <strong>Numero di licenza :</strong>
                                            <input type="number" name="license_number" class="form-control" id=""
                                                   value="{{$user->license_number}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Data di Nascita :</strong>
                                            <input type="date" required name="d_o_b" class="form-control" id=""
                                                   value="{{$user->d_o_b}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Luogo di Nascita :</strong>
                                            <input type="text" required name="birth_place" class="form-control" id=""
                                                   value="{{$user->birth_place}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group" id="released_on">
                                            <strong>Rilasciata il :</strong>
                                            <input type="text" name="released_on" class="form-control" id=""
                                                   value="{{$user->released_on}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza prova di sgancio :</strong>
                                            <input type="date" required name="release_test_deadline"
                                                   class="form-control" id=""
                                                   value="{{$user->release_test_deadline}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza attività minima :</strong>
                                            <input type="date" required name="minimum_activity_deadline"
                                                   class="form-control"
                                                   id=""
                                                   value="{{$user->minimum_activity_deadline}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Compagnia assicuratva :</strong>
                                            <input type="text" required name="insurance_company" class="form-control"
                                                   id=""
                                                   value="{{$user->insurance_company}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza assicurazione :</strong>
                                            <input type="date" required name="insurance_expiration" class="form-control"
                                                   id=""
                                                   value="{{$user->insurance_expiration}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza visita medica :</strong>
                                            <input type="date" required name="medical_examination_deadline"
                                                   class="form-control"
                                                   id="" value="{{$user->medical_examination_deadline}}"
                                                   data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Paese :</strong>
                                            <input type="text" required name="village" class="form-control" id=""
                                                   value="{{$user->village}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group" id="expiry_date">
                                            <strong>Scadenza Del Rimborso Di Emergenza :</strong>
                                            <input type="date" name="expiry_date" class="form-control" id=""
                                                   value="{{$user->expiry_date}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group" id="emergency_contact">
                                            <strong>Rimborso Di Emergenza :</strong>
                                            <input type="date" name="emergency_contact" class="form-control" id=""
                                                   value="{{$user->emergency_contact}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Grado del contatto :</strong>
                                            <input type="text" required name="degree_of_contact" class="form-control"
                                                   id=""
                                                   value="{{$user->degree_of_contact}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group d-flex">
                                            <label class="form-check-label mr-5" for="exampleCheck1">Allievo :</label>
                                            <label class="switch">
                                                <input type="checkbox" id="student" name="student"
                                                       class="form-check-input"
                                                       id="" value="{{$user->student}}"
                                                       data-default-file=""
                                                       @if($user->student === 'yes')checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group d-flex">
                                            <label class="form-check-label mr-5" for="">Possiede il
                                                materiale :</label>
                                            <label class="switch">
                                                <input type="checkbox" class="form-check-input"
                                                       value="{{$user->own_material}}"
                                                       id="own_material"
                                                       name="own_material"
                                                       data-default-file=""
                                                       @if($user->own_material === 'yes')checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group d-flex">
                                            <label class="form-check-label mr-5" for="">E-mail automatica :</label>
                                            <label class="switch">
                                                <input type="checkbox" class="form-check-input"
                                                       value="{{$user->send_auto_email}}"
                                                       name="send_auto_email"
                                                       data-default-file=""
                                                       @if($user->send_auto_email === 'yes')checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary btn-round">Invia</button>
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
    @push('script')
        <script>
            $(document).ready(function () {
                var studentCheckbox = $('#student');
                var releasedOn = $('#released_on input');
                var licenseNumber = $('#license_number input');

                // Function to add required validation
                function addRequiredValidation() {
                    releasedOn.prop('required', true);
                    licenseNumber.prop('required', true);
                }

                // Function to remove required validation
                function removeRequiredValidation() {
                    releasedOn.prop('required', false);
                    licenseNumber.prop('required', false);
                }

                // Initial check
                if (studentCheckbox.prop('checked')) {
                    releasedOn.closest('.form-group').show();
                    licenseNumber.closest('.form-group').show();
                    addRequiredValidation();
                } else {
                    releasedOn.closest('.form-group').hide();
                    licenseNumber.closest('.form-group').hide();
                    removeRequiredValidation();
                }

                // Checkbox change event
                studentCheckbox.change(function () {
                    if (studentCheckbox.prop('checked')) {
                        releasedOn.closest('.form-group').show();
                        licenseNumber.closest('.form-group').show();
                        addRequiredValidation();
                    } else {
                        releasedOn.closest('.form-group').hide();
                        licenseNumber.closest('.form-group').hide();
                        removeRequiredValidation();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                var ownMaterialCheckbox = $('#own_material');
                var expiryDateInput = $('#expiry_date input');
                var emergencyContactInput = $('#emergency_contact input');

                function showExpiryDateAndHideEmergencyContact() {
                    expiryDateInput.closest('.form-group').show();
                    emergencyContactInput.closest('.form-group').hide();
                    expiryDateInput.prop('required', true);
                    emergencyContactInput.prop('required', false);
                }

                function hideExpiryDateAndShowEmergencyContact() {
                    expiryDateInput.closest('.form-group').hide();
                    emergencyContactInput.closest('.form-group').show();
                    expiryDateInput.prop('required', false);
                    emergencyContactInput.prop('required', true);
                }

                // Initial check
                if (ownMaterialCheckbox.prop('checked')) {
                    showExpiryDateAndHideEmergencyContact();
                } else {
                    hideExpiryDateAndShowEmergencyContact();
                }

                // Checkbox change event
                ownMaterialCheckbox.change(function () {
                    if (ownMaterialCheckbox.prop('checked')) {
                        showExpiryDateAndHideEmergencyContact();
                    } else {
                        hideExpiryDateAndShowEmergencyContact();
                    }
                });
            });
        </script>

    @endpush
@endsection
