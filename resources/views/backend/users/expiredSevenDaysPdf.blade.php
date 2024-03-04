<!DOCTYPE html>
<html lang="en">
@php

        $users =  \App\Models\User::where('role', 1)->get();
        $expiredDays = [];
        foreach ($users as $user) {
            if ($user->expiredSevenDays() !== '<span class="badge badge-success">Not Expired</span>') {
                $expiredDays[] = $user;
            }
        }

@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ditestv | PDF</title>
    <style>
        .expired-date {
            color: red;
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
        <div style="display: inline-block;  text-align: center; padding-left: 50px; margin-top: 16px;">
            <h1 style="color: white;margin-top: 40px;">Clienti scaduti tra sette giorni</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <table>
            <tr>
                <th style="font-family:  Verdana;padding-right: 10px;">Nome</th>
                <th style="font-family: Verdana;">Scadenza assicurazione</th>
                <th style="padding-right: 30px;font-family: Verdana;">Scadenza attività </th>
                <th style="padding-right: 10px;font-family: Verdana;">Scadenza dell'esame</th>
                <th style="padding-right: 6px;font-family: Verdana;padding-left: 15px;">Rimborso di emergenza
                </th>
                <th style="padding-right: 0px;padding-left: 10px;font-family: Verdana;">Scadenza prova di sgancio
                </th>
                <th style="font-family: Verdana;">Scadenza IP
                </th>
            </tr>

            @foreach($users as $key => $user)
                <tr>
                    <td>{{$user->first_name . ' ' . $user->last_name}}</td>
                    <td class="m-5" style="padding-left: 21px;">
                        @php
                            $insuranceExpiration = \Carbon\Carbon::parse($user->insurance_expiration);
                            $daysDifference = $insuranceExpiration->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        @if (!empty($user->insurance_expiration) && $insuranceExpiration->isPast() && $daysDifference >= -7)
                            <span class="" style="color: red;">{{ date_format(date_create($user->insurance_expiration), 'd-m-Y') }}</span>
                        @else
                            <span>{{ date_format(date_create($user->insurance_expiration), 'd-m-Y') }}</span>
                        @endif
                    </td>
                    <td class="m-5" style="padding-left: 15px;">

                        @php
                            $insuranceExpiration = \Carbon\Carbon::parse($user->minimum_activity_deadline);
                            $daysDifference = $insuranceExpiration->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        @if (!empty($user->minimum_activity_deadline) && $insuranceExpiration->isPast() && $daysDifference >= -7)
                            <span class="" style="color: red;">{{ date_format(date_create($user->minimum_activity_deadline), 'd-m-Y') }}</span>
                        @else
                            <span>{{ date_format(date_create($user->minimum_activity_deadline), 'd-m-Y') }}</span>
                        @endif

{{--                        <span class="expired-date">{{ date_format(date_create($user->minimum_activity_deadline), 'd-m-Y') }}</span>--}}
                    </td>
                    <td class="m-5" style="padding-left: 18px;">

                        @php
                            $insuranceExpiration = \Carbon\Carbon::parse($user->medical_examination_deadline);
                            $daysDifference = $insuranceExpiration->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        @if (!empty($user->medical_examination_deadline) && $insuranceExpiration->isPast() && $daysDifference >= -7)
                            <span class="expired-date" style="color: red;">{{ date_format(date_create($user->medical_examination_deadline), 'd-m-Y') }}</span>
                        @else
                            <span>{{ date_format(date_create($user->medical_examination_deadline), 'd-m-Y') }}</span>
                        @endif
{{--                        <span class="expired-date">{{ date_format(date_create($user->medical_examination_deadline), 'd-m-Y') }}</span>--}}
                    </td>
                    <td class="m-5" style="padding-left: 32px;">

                        @php
                            $insuranceExpiration = \Carbon\Carbon::parse($user->repayment_expiry_date);
                            $daysDifference = $insuranceExpiration->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        @if (!empty($user->repayment_expiry_date) && $insuranceExpiration->isPast() && $daysDifference >= -7)
                            <span class="expired-date" style="color: red;">{{ date_format(date_create($user->repayment_expiry_date), 'd-m-Y') }}</span>
                        @else
                            <span>{{ date_format(date_create($user->repayment_expiry_date), 'd-m-Y') }}</span>
                        @endif
{{--                        <span class="expired-date">{{ date_format(date_create($user->repayment_expiry_date), 'd-m-Y') }}</span>--}}
                    </td>
                    <td class="m-5" style="padding-left: 30px;">

                        @php
                            $insuranceExpiration = \Carbon\Carbon::parse($user->release_test_deadline);
                            $daysDifference = $insuranceExpiration->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        @if (!empty($user->release_test_deadline) && $insuranceExpiration->isPast() && $daysDifference >= -7)
                            <span class="expired-date" style="color: red;">{{ date_format(date_create($user->release_test_deadline), 'd-m-Y') }}</span>
                        @else
                            <span>{{ date_format(date_create($user->release_test_deadline), 'd-m-Y') }}</span>
                        @endif
{{--                        <span class="expired-date">{{ date_format(date_create($user->release_test_deadline), 'd-m-Y') }}</span>--}}
                    </td>
                    <td class="m-5">
                        @php
                            $insuranceExpiration = \Carbon\Carbon::parse($user->ip_expiryDate);
                            $daysDifference = $insuranceExpiration->diffInDays(\Carbon\Carbon::now());
                        @endphp
                        @if (!empty($user->ip_expiryDate) && $insuranceExpiration->isPast() && $daysDifference >= -7)
                            <span class="expired-date" style="color: red;">{{ date_format(date_create($user->ip_expiryDate), 'd-m-Y') }}</span>
                        @else
                            <span>{{ date_format(date_create($user->ip_expiryDate), 'd-m-Y') }}</span>
                        @endif
{{--                        <span class="expired-date">{{ date_format(date_create($user->ip_expiryDate), 'd-m-Y') }}</span>--}}
                    </td>
                </tr>
            @endforeach


        </table>
    </div>
</div>
</body>

</html>
