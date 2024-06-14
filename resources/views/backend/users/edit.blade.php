@extends('layouts.app')
@section('content')
    <?php
    $isChecked = 'yes';
    $Checked = 'yes'
    ?>

    <style>
        @media screen and (max-width: 755px) and (max-height: 932px) {

            .main {
                display: flex;
                justify-content: space-between;
            }

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
                            <h4>Modifica Nuovo Cliente</h4>
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
                                            {!! Form::number('phone_number',$user->phone_number, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Contatto Di Emergenza :</strong>
                                            <input type="number" name="emergency_phone_number"
                                                   class="form-control" id=""
                                                   value="{{$user->emergency_phone_number}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Città :</strong>
                                            <input type="text" name="city" class="form-control" id=""
                                                   value="{{$user->city}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Provincia :</strong>
                                            <input type="text" name="province" class="form-control"
                                                   value="{{$user->province}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>CAP :</strong>
                                            <input type="number" name="postal_code" class="form-control"
                                                   value="{{$user->postal_code}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Residente :</strong>
                                            <input type="text" name="resident" class="form-control" id=""
                                                   value="{{$user->resident}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Data di Nascita :</strong>
                                            <input type="date"  name="d_o_b" class="form-control" id=""
                                                   value="{{$user->d_o_b}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Luogo di Nascita :</strong>
                                            <input type="text"  name="birth_place" class="form-control" id=""
                                                   value="{{$user->birth_place}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza prova di sgancio :</strong>
                                            <input type="date" required name="release_test_deadline"
                                                   class="form-control" id=""
                                                   value="{{date_format( $user->release_test_deadline ,'Y-m-d')}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza assicurazione :</strong>
                                            <input type="date" required name="insurance_expiration" class="form-control"
                                                   id=""
                                                   value="{{date_format($user->insurance_expiration,'Y-m-d')}}" data-default-file="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4" id="minimum_activity_deadline_container">
                                        <div class="form-group">
                                            <strong>Scadenza attività minima :</strong>
                                            <input type="date" name="minimum_activity_deadline" class="form-control"
                                                   value="{{ !empty($user->minimum_activity_deadline) ? date('Y-m-d', strtotime($user->minimum_activity_deadline)) : '' }}">
{{--                                            <input type="date"  name="minimum_activity_deadline" class="form-control" id="" value="{{date_format($user->minimum_activity_deadline,'Y-m-d')}}" data-default-file="">--}}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Compagnia assicuratva :</strong>
                                            <input type="text" name="insurance_company" class="form-control"
                                                   id=""
                                                   value="{{$user->insurance_company}}" data-default-file="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Scadenza visita medica :</strong>
                                            <input type="date" required name="medical_examination_deadline"
                                                   class="form-control"
                                                   id="" value="{{date_format($user->medical_examination_deadline,'Y-m-d')}}"
                                                   data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <strong>Paese :</strong>
                                            <input type="text" name="village" class="form-control" id=""
                                                   value="{{$user->village}}" data-default-file="">
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
                                            <strong>Grado del contatto :</strong>
                                            <input type="text" name="degree_of_contact"
                                                   class="form-control"
                                                   id=""
                                                   value="{{$user->degree_of_contact}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group" id="license_number">
                                            <strong>Numero di licenza :</strong>
                                            <input type="text" name="license_number" class="form-control" id=""
                                                   value="{{$user->license_number}}" data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group" id="expiry_date">
                                            <strong>Scadenza Ripiegamento Emergenza :</strong>
                                            <input type="date" name="repayment_expiry_date" class="form-control" id=""
                                                   value="{{$user->repayment_expiry_date?$user->repayment_expiry_date->format('Y-m-d'):''}}" data-default-file="">
                                        </div>
                                    </div>

                                </div>

{{--                                <div class="row">--}}
{{--                                   --}}
{{--                                </div>--}}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group d-flex main">
                                            <label class="form-check-label mr-5" for="exampleCheck1">Allievo
                                                :</label>
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
                                        <div class="form-group d-flex main">
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

                                    <div class="col-xs-12 col-sm-12 col-md-4 ">
                                        <div class="form-group d-flex main">
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
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group d-flex main">
                                            <label class="form-check-label mr-3 font-5 "
                                                   for="exampleCheck1">Possiede Abilitazioni o C.S :</label>
                                            <div class="">
                                                <label class="switch">
                                                    <input type="checkbox" class="form-check-input"
                                                           name="qualification" id="qualification" data-default-file=""
                                                           @if($user->qualification === 'yes')checked @endif
                                                    >
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="additionalCheckboxes"
                                     style="display: {{$user->qualification == "yes" ? 'block': 'none'}};">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group d-flex main">
                                                <label class="form-check-label mr-3 font-5" for="dl">D.L. :</label>
                                                <div>
                                                    <label class="switch">
                                                        <input type="checkbox" class="form-check-input" name="dl"
                                                               id="dl"
                                                               data-default-file=""
                                                               @if($user->dl === 'yes')checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group d-flex main">
                                                <label class="form-check-label mr-3 font-5" for="ipCheckbox">I.P
                                                    :</label>
                                                <div class="">
                                                    <label class="switch">
                                                        <input type="checkbox" class="form-check-input" name="ip"
                                                               id="ipCheckbox" data-default-file=""
                                                               @if($user->ip === 'yes')checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group d-flex main">
                                                <label class="form-check-label mr-3 font-5" for="ipTandem">I.P.Tandem:
                                                </label>
                                                <div class="">
                                                    <label class="switch">
                                                        <input type="checkbox" class="form-check-input" name="ip_tandem"
                                                               id="ipTandem" data-default-file=""
                                                               @if($user->ip_tandem === 'yes')checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group d-flex main">
                                                <label class="form-check-label mr-3 font-5" for="ipAff">I.P. AFF
                                                    :</label>
                                                <div class="">
                                                    <label class="switch">
                                                        <input type="checkbox" class="form-check-input" name="ip_aff"
                                                               id="ipAff" data-default-file=""
                                                               @if($user->ip_aff === 'yes')checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group d-flex main">
                                                <label class="form-check-label mr-3 font-5" for="ips">I.P.S :</label>
                                                <div class="">
                                                    <label class="switch">
                                                        <input type="checkbox" class="form-check-input" name="ips"
                                                               id="ips"
                                                               data-default-file=""
                                                               @if($user->ips === 'yes')checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="form-group d-flex main">
                                                <label class="form-check-label mr-3 font-5" for="ipe">I.P.E :</label>
                                                <div class="">
                                                    <label class="switch">
                                                        <input type="checkbox" class="form-check-input" name="ipe"
                                                               id="ipe"
                                                               data-default-file=""
                                                               @if($user->ipe === 'yes')checked @endif>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--------------------Release Date Start---------------------->
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4" id="dlReleaseDate" style="display: {{$user->dl == "yes" ? 'block': 'none'}};" >
                                        <div class="form-group" >
                                            <strong>D.L. Data di rilascio :</strong>
                                            <input type="date" name="dl_releaseDate" class="form-control"
                                                   id="dlReleaseDateInput"
                                                   value="{{ old('dl_releaseDate',$user->dl_releaseDate) }}"
                                                   data-default-file="" >
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4" id="ipDateContainer" style="display: {{$user->ip == "yes" ? 'block': 'none'}};">
                                        <div class="form-group">
                                            <strong>Data scadenza IP:</strong>
                                            <input type="date" name="ip_expiryDate" class="form-control" id="ipDateInput"
                                                   value="{{$user->ip_expiryDate?$user->ip_expiryDate->format('Y-m-d'):''}} ">

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4" id="tandemReleaseDate"
                                         style="display: {{$user->ip_tandem == "yes" ? 'block': 'none'}};">
                                        <div class="form-group">
                                            <strong>I.P Tandem Data di rilascio :</strong>
                                            <input type="date" name="tandem_release_date" class="form-control"
                                                   id="tandemReleaseDateInput"
                                                   value="{{ old('tandem_release_date',$user->tandem_release_date) }}"
                                                   data-default-file="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4" id="AffReleaseDate"
                                         style="display: {{$user->ip_aff == "yes" ? 'block': 'none'}};">
                                        <div class="form-group">
                                            <strong>I.P. AFF Data di rilascio :</strong>
                                            <input type="date" id="affReleaseDateInput" name="ip_aff_release_date"
                                                   value="{{ old('ip_aff_release_date',$user->ip_aff_release_date) }}"
                                                   class="form-control"
                                                   data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4" id="ipsReleaseDate"
                                         style="display: {{$user->ips == "yes" ? 'block': 'none'}};">
                                        <div class="form-group">
                                            <strong>I.P.S Data di rilascio :</strong>
                                            <input type="date" id="ipsReleaseDateInput" name="ips_release_date"
                                                   value="{{ old('ips_release_date',$user->ips_release_date) }}"
                                                   class="form-control"
                                                   data-default-file="">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4" id="ipeReleaseDate"
                                         style="display: {{$user->ipe == "yes" ? 'block': 'none'}};">
                                        <div class="form-group">
                                            <strong>I.P.E Data di rilascio :</strong>
                                            <input type="date" id="ipeReleaseDateInput" name="ipe_release_date"
                                                   value="{{ old('ipe_release_date',$user->ipe_release_date) }}"
                                                   class="form-control"
                                                   data-default-file="">
                                        </div>
                                    </div>

                                </div>

                                <!--------------Release Date End-------------->

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
            document.addEventListener('DOMContentLoaded', function() {
                const studentCheckbox = document.getElementById('student');
                const deadlineContainer = document.getElementById('minimum_activity_deadline_container');

                function toggleDeadlineContainer() {
                    if (studentCheckbox.checked) {
                        deadlineContainer.style.display = 'none';
                    } else {
                        deadlineContainer.style.display = 'block';
                    }
                }
                studentCheckbox.addEventListener('change', toggleDeadlineContainer);
                // Initialize the visibility on page load
                toggleDeadlineContainer();
            });

            $(document).ready(function () {

                var ownMaterialCheckbox = $('#own_material');
                var expiryDateInput = $('#expiry_date input');


                function showExpiryDateAndHideEmergencyContact() {
                    expiryDateInput.closest('.form-group').show();
                    expiryDateInput.prop('required', true);
                }

                function hideExpiryDateAndShowEmergencyContact() {
                    expiryDateInput.closest('.form-group').hide();
                    expiryDateInput.prop('required', false);
                }

                // Initial check
                if (ownMaterialCheckbox.prop('checked')) {
                    showExpiryDateAndHideEmergencyContact();
                } else {
                    hideExpiryDateAndShowEmergencyContact();
                }

                ownMaterialCheckbox.change(function () {
                    if (ownMaterialCheckbox.prop('checked')) {
                        showExpiryDateAndHideEmergencyContact();
                    } else {
                        hideExpiryDateAndShowEmergencyContact();
                    }
                });

            });


            $(document).ready(function () {
                var studentCheckbox = $('#student');
                var releasedOn = $('#released_on input');
                var licenseNumber = $('#license_number input');

                function addRequiredValidation() {
                    // releasedOn.prop('required', true);
                    // licenseNumber.prop('required', true);
                }

                function removeRequiredValidation() {
                    // releasedOn.prop('required', false);
                    // licenseNumber.prop('required', false);
                }

                if (studentCheckbox.prop('checked')) {
                    releasedOn.closest('.form-group').hide();
                    licenseNumber.closest('.form-group').hide();
                    removeRequiredValidation();
                } else {
                    releasedOn.closest('.form-group').show();
                    licenseNumber.closest('.form-group').show();

                    addRequiredValidation();
                }

                studentCheckbox.change(function () {
                    if (studentCheckbox.prop('checked')) {
                        releasedOn.closest('.form-group').hide();
                        licenseNumber.closest('.form-group').hide();
                        removeRequiredValidation();
                    } else {
                        releasedOn.closest('.form-group').show();
                        licenseNumber.closest('.form-group').show();
                        addRequiredValidation();
                    }
                });

                var qualificationCheckbox = document.getElementById("qualification");
                var additionalCheckboxes = document.getElementById("additionalCheckboxes");

                qualificationCheckbox.addEventListener("change", function () {
                    if (qualificationCheckbox.checked) {
                        additionalCheckboxes.style.display = "block";
                    } else {
                        additionalCheckboxes.style.display = "none";
                    }
                });

                var dl = document.getElementById("dl");
                var dlReleaseDateDiv = document.getElementById("dlReleaseDate");
                var dlReleaseDateInput = document.getElementById("dlReleaseDateInput");

                dl.addEventListener("change", function () {
                    if (dl.checked) {
                        dlReleaseDateDiv.style.display = "block";
                        // dlReleaseDateInput.setAttribute("required", "required");
                    } else {
                        dlReleaseDateDiv.style.display = "none";
                        // dlReleaseDateInput.removeAttribute("required");
                    }
                });


                var ipCheckbox = document.getElementById("ipCheckbox");
                var ipDateContainer = document.getElementById("ipDateContainer");
                var ipDateInput = document.getElementById("ipDateInput");

                ipCheckbox.addEventListener("change", function () {
                    if (ipCheckbox.checked) {
                        ipDateContainer.style.display = "block";
                        // ipDateInput.setAttribute("required", "required");
                    } else {
                        ipDateContainer.style.display = "none";
                        // ipDateInput.removeAttribute("required");
                    }
                });


                var ipTandem = document.getElementById("ipTandem");
                var tandemReleaseDateDiv = document.getElementById("tandemReleaseDate");
                var tandemReleaseDateInput = document.getElementById("tandemReleaseDateInput");

                ipTandem.addEventListener("change", function () {
                    if (ipTandem.checked) {
                        tandemReleaseDateDiv.style.display = "block";
                        // tandemReleaseDateInput.setAttribute("required", "required");
                    } else {
                        tandemReleaseDateDiv.style.display = "none";
                        // tandemReleaseDateInput.removeAttribute("required");
                    }
                });


                var ipAff = document.getElementById("ipAff");
                var affReleaseDateDiv = document.getElementById("AffReleaseDate");
                var affReleaseDateInput = document.getElementById("affReleaseDateInput");

                ipAff.addEventListener("change", function () {
                    if (ipAff.checked) {
                        affReleaseDateDiv.style.display = "block";
                        // affReleaseDateInput.setAttribute("required", "required");
                    } else {
                        affReleaseDateDiv.style.display = "none";
                        // affReleaseDateInput.removeAttribute("required");
                    }
                });


                var ips = document.getElementById("ips");
                var ipsReleaseDateDiv = document.getElementById("ipsReleaseDate");
                var ipsReleaseDateInput = document.getElementById("ipsReleaseDateInput");

                ips.addEventListener("change", function () {
                    if (ips.checked) {
                        ipsReleaseDateDiv.style.display = "block";
                        // ipsReleaseDateInput.setAttribute("required", "required");
                    } else {
                        ipsReleaseDateDiv.style.display = "none";
                        // ipsReleaseDateInput.removeAttribute("required");
                    }
                });


                var ipe = document.getElementById("ipe");
                var ipeReleaseDateDiv = document.getElementById("ipeReleaseDate");
                var ipeReleaseDateInput = document.getElementById("ipeReleaseDateInput");

                ipe.addEventListener("change", function () {
                    if (ipe.checked) {
                        ipeReleaseDateDiv.style.display = "block";
                        // ipeReleaseDateInput.setAttribute("required", "required");
                    } else {
                        ipeReleaseDateDiv.style.display = "none";
                        // ipeReleaseDateInput.removeAttribute("required");
                    }
                });


            });
        </script>

    @endpush
@endsection
