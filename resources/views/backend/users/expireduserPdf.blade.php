<!DOCTYPE html>
<html lang="en">
@php
    $users = \App\Models\User::where('role', 1)->get();
       $expiredUsers = [];
       foreach ($users as $user) {
           if ($user->showExpiredDate() !== '<span class="badge badge-success">Not Expired</span>') {
               $expiredUsers[] = $user;
           }
       }
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ditestv | PDF</title>
</head>
<body>
<div class="container" style="font-family: Sans-Serif;">
    <div class="container" style=" background-color: #e67238;">
        <div style=" background-color: #e67238; padding-right: 40px; display: inline-block;">
            <img width="150px" style="margin-left: 20px;" height="50px" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('images/loding.png')))}}">
        </div>
        <div style="display: inline-block;  text-align: center; padding-left: 50px; margin-top: 16px;">
            <h2 style="color: white">Clienti Scaduti</h2>
        </div>
    </div>
    <br>
    <div class="row" >
        <table style="font-family: Sans-Serif;">
            <tr>
                <th style="padding-right: 10px;">No</th>
                <th style="padding-right: 10px;">Nome</th>
                <th style="padding-right: 20px;">Cognome</th>
                <th style="padding-right: 10px;text-align: start;">Scadenza assicurazione</th>
                <th style="padding-right: 30px;">Scadenza attività minima </th>
                <th style="padding-right: 20px;">Scadenza visita medica</th>
                <th style="padding-left: 10px;">Scadenza Del Rimborso Di Emergenza</th>
                <th style="padding-right: 10px;padding-left: 10px;">Scadenza prova di sgancio</th>
            </tr>
            @php
            $i = 1;
            @endphp
            @foreach ($expiredUsers as $user)
                <tr>
                    <td>{{$i++}}</td>
                    <td class="m-5">{{$user->first_name}}</td>
                    <td class="">{{$user->last_name}}</td>
                    <td class="m-5" style="padding-left: 5px; ">{{$user->insurance_expiration}}</td>
                    <td class="m-5" style="padding-left: 5px;">{{$user->minimum_activity_deadline}}</td>
                    <td class="m-5" style="padding-left: 5px;">{{$user->medical_examination_deadline}}</td>
                    <td class="m-5" style="padding-left: 15px;">{{$user->repayment_expiry_date}}</td>
                    <td class="m-5" style="padding-left: 15px;">{{$user->release_test_deadline}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>

</html>
