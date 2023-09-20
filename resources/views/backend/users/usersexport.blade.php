{{--@extends('layouts.app')--}}

{{--@section('content')--}}


    <div >
{{--        @include('backend.users.includes.blockHeader')--}}
        <div >
            <div >
                <div >
                    <div>
{{--                        <div class="header">--}}
{{--                            <ul class="header-dropdown dropdown dropdown-animated scale-left">--}}
{{--                                <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i--}}
{{--                                            class="icon-refresh"></i></a></li>--}}
{{--                                <li><a href="javascript:void(0);" class="full-screen"><i--}}
{{--                                            class="icon-size-fullscreen"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div >
                            <table >
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cogonome</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Città</th>
                                    <th>Provincia</th>
                                    <th>resident</th>
                                    <th>Postal code</th>
                                    <th>village</th>
                                    <th>Date of Birth</th>
                                    <th>Birth place</th>
                                    <th>Student</th>
                                    <th>License Number</th>
                                    <th>Released On</th>
                                    <th>Released Test Deadline</th>
                                    <th>minimum_activity_deadline</th>
                                    <th>insurance_company</th>
                                    <th>insurance_expiration</th>
                                    <th>medical_examination_deadline</th>
                                    <th>own_material</th>
                                    <th>expiry_date</th>
                                    <th>emergency_contact</th>
                                    <th>degree_of_contact</th>
                                    <th>role</th>
                                    <th>send_auto_email</th>
                                    <th>release_test_deadline_status</th>
                                    <th>minimum_activity_deadline_status</th>
                                    <th>insurance_company_status</th>
                                    <th>insurance_expiration_status</th>
                                    <th>medical_examination_deadline_status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>{{$user->province}}</td>
                                    <td>{{$user->resident}}</td>
                                    <td>{{$user->postal_code}}</td>
                                    <td>{{$user->village}}</td>
                                    <td>{{$user->d_o_b}}</td>
                                    <td>{{$user->birth_place}}</td>
                                    <td>{{$user->student}}</td>
                                    <td>{{$user->license_number}}</td>
                                    <td>{{$user->released_on}}</td>
                                    <td>{{$user->release_test_deadline}}</td>
                                    <td>{{$user->minimum_activity_deadline}}</td>
                                    <td>{{$user->insurance_company}}</td>
                                    <td>{{$user->insurance_expiration}}</td>
                                    <td>{{$user->medical_examination_deadline}}</td>
                                    <td>{{$user->own_material}}</td>
                                    <td>{{$user->expiry_date}}</td>
                                    <td>{{$user->emergency_contact}}</td>
                                    <td>{{$user->degree_of_contact}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->send_auto_email}}</td>
                                    <td>{{$user->release_test_deadline_status}}</td>
                                    <td>{{$user->minimum_activity_deadline_status}}</td>
                                    <td>{{$user->insurance_company_status}}</td>
                                    <td>{{$user->insurance_expiration_status}}</td>
                                    <td>{{$user->medical_examination_deadline_status}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--@endsection--}}
