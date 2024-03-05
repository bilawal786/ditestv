<!DOCTYPE html>
<html lang="en">
@php
    $users = \App\Models\User::where('role',1)->get();
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ditestv | PDF</title>
    <style>
        .bottom-right-text {
            position: fixed;
            bottom: 0;
            right: 0;
            color:darkgrey;
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

        <div style="display: inline-block;  text-align: center;padding-left: 50px;margin-left: 200px; margin-top: 16px;">
            <h1 style="color: white; margin-top: 40px;font-family: Verdana;">Tutti i Clienti</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <table style="width: 100%;">
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
            @php
                $i =1;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td class="" style="padding-left: 23px;">{{$user->first_name . ' ' . $user->last_name}}</td>
                    <td class="m-5" style="padding-left: 21px;">
{{--                        {{ date_format(date_create($user->insurance_expiration), 'd-m-Y') }}--}}

                        @if(!empty($user->insurance_expiration))
                            {{ date_format(date_create($user->insurance_expiration), 'd-m-Y') }}
                        @else

                        @endif
                    </td>
                    <td class="m-5"
                        style="padding-left: 15px;">
{{--                        {{date_format(date_create($user->minimum_activity_deadline), 'd-m-Y')}}--}}
                        @if(!empty($user->minimum_activity_deadline))
                            {{ date_format(date_create($user->minimum_activity_deadline), 'd-m-Y') }}
                        @else

                        @endif
                    </td>

                    <td class="m-5" style="padding-left: 18px;">
                        @if(!empty($user->medical_examination_deadline))
                            {{ date_format(date_create($user->medical_examination_deadline), 'd-m-Y') }}
                        @else

                        @endif
                    </td>
                    <td class="m-5"
                        style="padding-left: 32px;">
{{--                        {{date_format(date_create($user->repayment_expiry_date), 'd-m-Y')}}--}}
                        @if(!empty($user->repayment_expiry_date))
                            {{ date_format(date_create($user->repayment_expiry_date), 'd-m-Y') }}
                        @else

                        @endif
                    </td>
                    <td class="m-5"
                        style="padding-left: 30px;">
{{--                        {{date_format(date_create($user->release_test_deadline), 'd-m-Y')}}--}}
                        @if(!empty($user->release_test_deadline))
                            {{ date_format(date_create($user->release_test_deadline), 'd-m-Y') }}
                        @else

                        @endif
                    </td>
                    <td class="m-5">
{{--                        {{date_format(date_create($user->ip_expiryDate),'d-m-Y')}}--}}
                        @if(!empty($user->ip_expiryDate))
                            {{ date_format(date_create($user->ip_expiryDate), 'd-m-Y') }}
                        @else

                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>




</div>
</body>

</html>
{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--@php--}}
{{--    $users = \App\Models\User::where('role',1)->get();--}}
{{--@endphp--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>--}}
{{--    <title>Ditestv | PDF</title>--}}
{{--    <style>--}}
{{--        .bottom-right-text {--}}
{{--            position: fixed;--}}
{{--            bottom: 0;--}}
{{--            right: 0;--}}
{{--            color: darkgrey;--}}
{{--            margin: 20px; /* Optional: Adjust the margin as per your preference */--}}
{{--        }--}}

{{--        table {--}}
{{--            border-collapse: collapse;--}}
{{--            width: 100%;--}}
{{--        }--}}

{{--        th, td {--}}
{{--            padding: 8px;--}}
{{--            text-align: left;--}}
{{--            border-bottom: 1px solid #ddd;--}}
{{--        }--}}

{{--        tr:nth-child(even) {--}}
{{--            background-color: #f2f2f2;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body style="font-family: Verdana;font-size: 12px;">--}}

{{--<div class="container" style="">--}}
{{--    <div class="container" style=" background-color: #e67238;">--}}
{{--        <div style=" background-color: #e67238; padding-right: 40px; display: inline-block;">--}}

{{--            <img width="150px" style="padding-left: 10px;margin-bottom: 10px;" height="50px"--}}
{{--                 src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('images/loding.png')))}}">--}}
{{--        </div>--}}

{{--        <div style="display: inline-block;  text-align: center;padding-left: 50px; margin-top: 16px;">--}}
{{--            <h1 style="color: white; margin-top: 40px;font-family: Verdana;">Tutti i Clienti</h1>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <div class="row">--}}
{{--        <table>--}}
{{--            <tr>--}}
{{--                <th>Name</th>--}}
{{--                @foreach ($users as $user)--}}
{{--                    <td style="font-family: Verdana;">{{$user->first_name . ' ' . $user->last_name}}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>Insurance</th>--}}
{{--                @foreach ($users as $user)--}}

{{--                    <td style="font-family: Verdana;">{{ date_format(date_create($user->insurance_expiration), 'd-m-Y') }}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>minimum activity deadline</th>--}}
{{--                @foreach ($users as $user)--}}
{{--                    <td style="font-family: Verdana;">{{ date_format(date_create($user->minimum_activity_deadline), 'd-m-Y') }}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>medical examination deadlin</th>--}}
{{--                @foreach ($users as $user)--}}
{{--                    <td style="font-family: Verdana;">{{ date_format(date_create($user->medical_examination_deadline), 'd-m-Y') }}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>repayment expiry date</th>--}}
{{--                @foreach ($users as $user)--}}
{{--                    <td style="font-family: Verdana;">{{ date_format(date_create($user->repayment_expiry_date), 'd-m-Y') }}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>release test deadline</th>--}}
{{--                @foreach ($users as $user)--}}
{{--                    <td style="font-family: Verdana;">{{ date_format(date_create($user->release_test_deadline), 'd-m-Y') }}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>IP expiry</th>--}}
{{--                @foreach ($users as $user)--}}
{{--                    <td style="font-family: Verdana;">{{ date_format(date_create($user->ip_expiryDate), 'd-m-Y') }}</td>--}}
{{--                @endforeach--}}
{{--            </tr>--}}
{{--        </table>--}}
{{--    </div>--}}

{{--    --}}
{{--</div>--}}
{{--</body>--}}

{{--</html>--}}
