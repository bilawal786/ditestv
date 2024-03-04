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


            @foreach ($users as $user)
                <tr>
                    <td class="" style="padding-left: 23px;">{{$user->first_name . ' ' . $user->last_name}}</td>
                    @foreach(['insurance_expiration', 'minimum_activity_deadline', 'medical_examination_deadline', 'repayment_expiry_date', 'release_test_deadline', 'ip_expiryDate'] as $deadline)
                        @php
                            $date = date_create($user->$deadline);
                            $diffInDays = date_diff($date, date_create())->days;
                            $color = ($diffInDays >= 0 && $diffInDays <= 7) ? 'red' : '';
                        @endphp
                        <td class="m-5" style="padding-left: 21px; color: {{$color}}">
                            {{ date_format($date, 'd-m-Y') }}
                        </td>
                    @endforeach
                </tr>
            @endforeach



        </table>
    </div>
</div>
</body>

</html>