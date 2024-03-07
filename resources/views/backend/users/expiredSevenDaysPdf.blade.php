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
                <th style="font-family:  Verdana;padding-right: 45px;">Nome</th>
                <th style="font-family: Verdana;">Scadenza assicurazione</th>
                <th style="padding-right: 30px;font-family: Verdana;">Scadenza attività</th>
                <th style="padding-right: 10px;font-family: Verdana;">Scadenza vista medica</th>
                <th style="padding-right: 6px;font-family: Verdana;padding-left: 15px;">Scadenza Ripiegamento
                </th>
                <th style="padding-right: 0px;padding-left: 10px;font-family: Verdana;">Scadenza prova di sgancio
                </th>
                <th style="font-family: Verdana;">Scadenza IP
                </th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td class="" style="padding-left: 23px;">{{$user->first_name . ' ' . $user->last_name}}</td>
                    <td>
                        @if(\Carbon\Carbon::parse($user->insurance_expiration)->isPast())
                            @if(\Carbon\Carbon::parse($user->insurance_expiration)->diffInDays(\Carbon\Carbon::now()) <= 8)
                                <div style="color: red">
                                    {{$user->insurance_expiration->format('d-m-Y')}}
                                    ({{\Carbon\Carbon::parse($user->insurance_expiration)->diffInDays(\Carbon\Carbon::now())}}
                                    ) dte
                                </div>
                            @else
                                <div>
                                    {{$user->insurance_expiration->format('d-m-Y')}}
                                    ({{\Carbon\Carbon::parse($user->insurance_expiration)->diffInDays(\Carbon\Carbon::now())}}
                                    ) dte
                                </div>
                            @endif
                        @else
                            {{$user->insurance_expiration->format('d-m-Y')}}
                        @endif
                    </td>
                    <td>{{$user->minimum_activity_deadline}}</td>
                    <td>{{$user->medical_examination_deadline}}</td>
                    <td>{{$user->repayment_expiry_date}}</td>
                    <td>{{$user->release_test_deadline}}</td>
                    <td>{{$user->ip_expiryDate}}</td>
                    {{--                    @foreach(['insurance_expiration', 'minimum_activity_deadline', 'medical_examination_deadline', 'repayment_expiry_date', 'release_test_deadline', 'ip_expiryDate'] as $deadline)--}}
                    {{--                        @php--}}
                    {{--                           if ($user->$deadline){--}}
                    {{--                           $date = $user->$deadline->format('d-m-Y');--}}
                    {{--                               $today = \Carbon\Carbon::now()->addDays(8)->format('d-m-Y');--}}
                    {{--                           }--}}

                    {{--   //                            $color = $user->isWithinRange($date) ? 'red' : 'black';--}}
                    {{--   //                            $displayDate = $date ? $date->format('d-m-Y') : 'No date available';--}}
                    {{--                        @endphp--}}
                    {{--                        <td class="m-5"--}}
                    {{--                            style="padding-left: {{$date == $today ? '30px' : '18px'}}; color: red">--}}
                    {{--                            {{ $date }}--}}
                    {{--                        </td>--}}
                    {{--                    @endforeach--}}
                </tr>
            @endforeach

        </table>
    </div>

</div>
</body>

</html>
