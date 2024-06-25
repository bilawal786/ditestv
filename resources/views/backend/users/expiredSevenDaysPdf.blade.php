<!DOCTYPE html>
<html lang="en">
@php
    $users = \App\Models\User::where('role', 1)
                        ->orderBy('last_name', 'asc')
                        ->orderBy('first_name', 'asc')
                        ->get();
   $expiredUsers = [];
foreach ($users as $user) {
    foreach (['insurance_expiration', 'minimum_activity_deadline', 'medical_examination_deadline', 'repayment_expiry_date', 'release_test_deadline', 'ip_expiryDate'] as $dateField) {
        if ($user->$dateField) {
            $date = \Carbon\Carbon::parse($user->$dateField);
            if ($date->isPast() || ($date->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $date->isFuture())) {
                $expiredUsers[] = $user;
                break; // No need to check further fields for this user
            }
        }
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
        table {
            border-collapse: collapse;
        }
        tr td, tr th {
            border-bottom: 1px solid black;
            padding: 5px;
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
                <th style="font-family:  Verdana;">Cognome</th>
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


            @foreach ($expiredUsers as $user)
                <tr>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->first_name}}</td>

                    @foreach (['insurance_expiration', 'minimum_activity_deadline', 'medical_examination_deadline', 'repayment_expiry_date', 'release_test_deadline', 'ip_expiryDate'] as $dateField)
                        <td>
                            @if($dateField == 'ip_expiryDate' && !$user->$dateField)
                                <div style="color: black">NO IP</div>
                            @elseif($dateField == 'minimum_activity_deadline' && !$user->$dateField)
                                <div style="color: black">ALLIEVO</div>
                            @elseif ($dateField == 'repayment_expiry_date' && !$user->$dateField)
                                <div style="color: black">NO MATERIALE</div>
                            @else
                                @if($user->$dateField)
                                    @php
                                        $date = \Carbon\Carbon::parse($user->$dateField);
                                    @endphp
                                    <div style="color: {{ $date->isPast() || ($date->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $date->isFuture()) ? 'red' : 'black' }}">
                                        {{ $date->format('d-m-Y') }}
                                    </div>
                                @endif
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach


{{--            @foreach ($users as $user)--}}
{{--                @php--}}
{{--                    $showName = true;--}}
{{--                @endphp--}}

{{--                --}}{{-- Check each date field --}}
{{--                @foreach (['insurance_expiration', 'minimum_activity_deadline', 'medical_examination_deadline', 'repayment_expiry_date', 'release_test_deadline', 'ip_expiryDate'] as $dateField)--}}
{{--                    @if ($user->$dateField && $user->$dateField->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $user->$dateField->isFuture())--}}
{{--                        @php--}}
{{--                            $showName = false; // Found a matching date, do not show the name--}}
{{--                            break; // No need to check further, exit the loop--}}
{{--                        @endphp--}}
{{--                    @endif--}}
{{--                @endforeach--}}

{{--                --}}{{-- Display row if we are not showing the name --}}
{{--                @if (!$showName)--}}
{{--                    <tr>--}}
{{--                        <td >{{$user->last_name}}</td>--}}
{{--                        <td >{{$user->first_name }}</td>--}}

{{--                        @foreach (['insurance_expiration', 'minimum_activity_deadline', 'medical_examination_deadline', 'repayment_expiry_date', 'release_test_deadline', 'ip_expiryDate'] as $dateField)--}}
{{--                            <td>--}}
{{--                                @if($dateField == 'ip_expiryDate' && !$user->$dateField)--}}
{{--                                    <div style="color: black">NO IP</div>--}}
{{--                                @elseif($dateField == 'minimum_activity_deadline' && !$user->$dateField)--}}
{{--                                    <div style="color: black">ALLIEVO</div>--}}
{{--                                @else--}}
{{--                                    @if($user->$dateField)--}}
{{--                                        <div style="color: {{ $user->$dateField->diffInDays(\Carbon\Carbon::now()->subDay()) <= 8 && $user->$dateField->isFuture() ? 'red' : 'black' }}">--}}
{{--                                            {{$user->$dateField->format('d-m-Y')}}--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}
{{--                @endif--}}
{{--            @endforeach--}}

        </table>
    </div>

</div>
</body>

</html>
