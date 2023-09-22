{{--@extends('layouts.app')--}}

{{--@section('content')--}}


<div>
    {{--        @include('backend.users.includes.blockHeader')--}}
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <table>
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Cogonome</th>
                                <th>Email</th>
                                <th>Numero Di Telefono</th>
                                <th>contatto di emergenza</th>
                                <th>Città</th>
                                <th>Provincia</th>
                                <th>residente</th>
                                <th>Codice Postale</th>
                                <th>villaggio</th>
                                <th>Data di nascita</th>
                                <th>Luogo di nascita</th>
                                <th>Alunna</th>
                                <th>Numero di licenza</th>
                                <th>Rilasciato il</th>
                                <th>Scadenza del test rilasciato</th>
                                <th>scadenza minima dell'attività</th>
                                <th>compagnia assicurativa</th>
                                <th>scadenza assicurativa</th>
                                <th>scadenza visita medica</th>
                                <th>own_material</th>proprio materiale
                                <th>data di scadenza del rimborso</th>
                                <th>data del rimborso di emergenza</th>
                                <th>grado di contatto</th>
                                <th>ruolo</th>
                                <th>invia e-mail automatica</th>
                                <th>stato della scadenza del test di rilascio</th>
                                <th>stato di scadenza attività minima</th>
                                <th>>stato della data di scadenza</th>
                                <th>stato di scadenza dell'assicurazione</th>
                                <th>stato della scadenza della visita medica</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->emergency_phone_number}}</td>
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
                                    <td>{{$user->repayment_expiry_date}}</td>
                                    <td>{{$user->emergency_repayment_date}}</td>
                                    <td>{{$user->degree_of_contact}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->send_auto_email}}</td>
                                    <td>{{$user->release_test_deadline_status}}</td>
                                    <td>{{$user->minimum_activity_deadline_status}}</td>
                                    <td>{{$user->expiry_date_status}}</td>
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
