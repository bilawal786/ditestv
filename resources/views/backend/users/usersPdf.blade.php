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
</head>
<body>

<div class="container" style="">
    <div class="container" style=" background-color: #e67238;">
        <div style=" background-color: #e67238; padding-right: 40px; display: inline-block;">

            <img width="150px" style="padding-left: 10px;margin-bottom: 10px;" height="50px"
                 src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('images/loding.png')))}}">
        </div>

        <div style="display: inline-block;  text-align: center;padding-left: 50px; margin-top: 16px;">
            <h1 style="color: white; margin-top: 40px;font-family: Sans-Serif;">Tutti i Clienti</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <table>
            <tr>
{{--                <th style="padding-right: 10px;font-family: Sans-Serif;">No</th>--}}
                <th style="font-family: Sans-Serif;padding-right: 10px;">Nome</th>
                <th style="padding-right: 20px;font-family: Sans-Serif;">Cognome</th>
                <th style="padding-right: 10px;font-family: Sans-Serif;text-align: start;">Scadenza assicurazione</th>
                <th style="padding-right: 30px;font-family: Sans-Serif;">Scadenza attività </th>
                <th style="padding-right: 20px;font-family: Sans-Serif;">Scadenza dell'esame</th>
                <th style="padding-right: 6px;font-family: Sans-Serif;padding-left: 10px;">Rimborso di emergenza
                </th>
                <th style="padding-right: 5px;padding-left: 0px;font-family: Sans-Serif;">Scadenza prova di sgancio
                </th>
                <th style="padding-left: 2px;font-family: Sans-Serif;">Scadenza IP
                </th>
            </tr>
            @php
                $i =1;
            @endphp
            @foreach ($users as $user)
                <tr>
{{--                    <td>{{$i++}}</td>--}}
                    <td class="">{{$user->first_name}}</td>
                    <td class="">{{$user->last_name}}</td>
                    <td class="m-5" style="padding-left: 5px;">
                        {{ date_format(date_create($user->insurance_expiration), 'd-m-Y') }}
                    </td>{{--                    <td class="m-5" style="padding-left: 5px; ">{{$user->insurance_expiration}}</td>--}}
                    <td class="m-5" style="padding-left: 5px;">{{date_format(date_create($user->minimum_activity_deadline), 'd-m-Y')}}</td>
                    <td class="m-5" style="padding-left: 5px;">{{date_format(date_create($user->medical_examination_deadline), 'd-m-Y')}}</td>
                    <td class="m-5" style="padding-left: 15px;">{{date_format(date_create($user->repayment_expiry_date), 'd-m-Y')}}</td>
                    <td class="m-5" style="padding-left: 15px;">{{date_format(date_create($user->release_test_deadline), 'd-m-Y')}}</td>
                    <td class="m-5" style="padding-left: 15px;">{{date_format(date_create($user->ip_expiryDate),'d-m-Y')}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>

</html>
