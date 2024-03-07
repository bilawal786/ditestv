<!DOCTYPE html>
<html lang="en">
@php
    $users =  \App\Models\User::where('role', 1)->get();
@endphp


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ditestv | PDF</title>
    <style>
        .expired-date {
            color: red;
        }

        .bottom-right-text {
            position: fixed;
            bottom: 0;
            right: 0;
            color: darkgrey;
            margin: 20px; /* Optional: Adjust the margin as per your preference */
        }

        th {
            text-align: left;
        }
    </style>
</head>
<body style="font-family: Verdana;font-size: 12px;">
<div class="container" style="">
    <div class="container" style=" background-color: #e67238;">
        <div style=" background-color: #e67238; padding-right: 40px; display: inline-block;">
            <img width="150px" style="padding-left: 10px;margin-bottom: 10px;" height="50px"
                 src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('images/loding.png')))}}">
        </div>
        <div
            style="display: inline-block;  text-align: center; padding-left: 50px;margin-left: 110px; margin-top: 16px;">
            <h1 style="color: white;margin-top: 40px;">Soci con scadenze a 8 giorni</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <table style="width: 100%; text-align: start;">
            <tr>
                <th style="font-family:  Verdana;">Nome</th>
                <th style="font-family: Verdana;">Scadenza assicurazione</th>
                <th style="font-family: Verdana;">Scadenza attività</th>
                <th style="font-family: Verdana;">Scadenza vista medica</th>
                <th style="font-family: Verdana;">Scadenza Ripiegamento
                </th>
                <th style="font-family: Verdana;">Scadenza prova di sgancio
                </th>
                <th style="font-family: Verdana;">Scadenza IP
                </th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td class="">{{$user->first_name . ' ' . $user->last_name}}</td>
                    <td>
                        @if($user->insurance_expiration)
                            @if($user->insurance_expiration->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $user->insurance_expiration->isFuture())
                                <div style="color: red">
                                    {{$user->insurance_expiration->format('d-m-Y')}}

                                </div>
                            @else
                                @if($user->insurance_expiration->isToday() || $user->insurance_expiration->isPast())
                                    <div style="color: red">
                                        {{$user->insurance_expiration->format('d-m-Y')}}
                                    </div>
                                @else
                                    {{$user->insurance_expiration->format('d-m-Y')}}
                                @endif
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($user->minimum_activity_deadline)
                            @if($user->minimum_activity_deadline->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $user->minimum_activity_deadline->isFuture())
                                <div style="color: red">
                                    {{$user->minimum_activity_deadline->format('d-m-Y')}}

                                </div>
                            @else
                                @if($user->minimum_activity_deadline->isToday() || $user->minimum_activity_deadline->isPast())
                                    <div style="color: red">
                                        {{$user->minimum_activity_deadline->format('d-m-Y')}}
                                    </div>
                                @else
                                    {{$user->minimum_activity_deadline->format('d-m-Y')}}
                                @endif
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($user->medical_examination_deadline)
                            @if($user->medical_examination_deadline->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $user->medical_examination_deadline->isFuture())
                                <div style="color: red">
                                    {{$user->medical_examination_deadline->format('d-m-Y')}}

                                </div>
                            @else
                                @if($user->medical_examination_deadline->isToday() || $user->medical_examination_deadline->isPast())
                                    <div style="color: red">
                                        {{$user->medical_examination_deadline->format('d-m-Y')}}
                                    </div>
                                @else
                                    {{$user->medical_examination_deadline->format('d-m-Y')}}
                                @endif
                            @endif
                    </td>
                    @endif
                    <td>
                        @if($user->repayment_expiry_date)
                            @if($user->repayment_expiry_date->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $user->repayment_expiry_date->isFuture())
                                <div style="color: red">
                                    {{$user->repayment_expiry_date->format('d-m-Y')}}

                                </div>
                            @else
                                @if($user->repayment_expiry_date->isToday() || $user->repayment_expiry_date->isPast())
                                    <div style="color: red">
                                        {{$user->repayment_expiry_date->format('d-m-Y')}}
                                    </div>
                                @else
                                    {{$user->repayment_expiry_date->format('d-m-Y')}}
                                @endif
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($user->release_test_deadline)
                            @if($user->release_test_deadline->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $user->release_test_deadline->isFuture())
                                <div style="color: red">
                                    {{$user->release_test_deadline->format('d-m-Y')}}

                                </div>
                            @else
                                @if($user->release_test_deadline->isToday() || $user->release_test_deadline->isPast())
                                    <div style="color: red">
                                        {{$user->release_test_deadline->format('d-m-Y')}}
                                    </div>
                                @else
                                    {{$user->release_test_deadline->format('d-m-Y')}}
                                @endif
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($user->ip_expiryDate)
                            @if($user->ip_expiryDate->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $user->ip_expiryDate->isFuture())
                                <div style="color: red">
                                    {{$user->ip_expiryDate->format('d-m-Y')}}

                                </div>
                            @else
                                @if($user->ip_expiryDate->isToday() || $user->ip_expiryDate->isPast())
                                    <div style="color: red">
                                        {{$user->ip_expiryDate->format('d-m-Y')}}
                                    </div>
                                @else
                                    {{$user->ip_expiryDate->format('d-m-Y')}}
                                @endif
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</div>
</body>

</html>
