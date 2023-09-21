<!DOCTYPE html>
<html lang="en">
@php
    $users = \App\Models\User::where('role',1)->get();
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodingCrust | Invoice Print</title>
</head>
<body>
<div class="container" style="width: 1300px;border: 1px solid black;margin: 0 40px;" >
    <div style="display: flex; background-color: #e67238">
    <div style="padding-right: 40px;width: 400px">
        <img src="{{asset('images/loding.png')}}" width="180" height="80">
    </div>
    <div style="width: 400px;text-align: center">
        <h1 style="color: white">All Customers</h1>
    </div>
    </div>


    <div class="row">
        <div class="col-12 table-responsive">
{{--            <table class="table table-striped " style="border: 1px solid black;">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th style="padding-right: 100px;">First Name</th>--}}
{{--                    <th style="padding-right: 100px;">Last Name</th>--}}
{{--                    <th style="padding-right: 100px;text-align: start;">email</th>--}}
{{--                    <th style="padding-left: 30px;padding-right: 100px;">Phone</th>--}}
{{--                    <th style="padding-right: 100px;">resident</th>--}}
{{--                    <th style="padding-right: 100px;padding-left: 30px;">City</th>--}}
{{--                    <th style="padding-right: 100px;padding-left: 30px;">Province</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach ($users as $user)--}}
{{--                    <tr>--}}
{{--                        <td class="m-5">{{$user->first_name}}</td>--}}
{{--                        <td class="">{{$user->last_name}}</td>--}}
{{--                        <td class="m-5" style="padding-left: 5px; ">{{$user->email}}</td>--}}
{{--                        <td class="m-5" style="padding-left: 30px;">{{$user->phone_number}}</td>--}}
{{--                        <td class="m-5" style="padding-left: 5px;">{{$user->resident}}</td>--}}
{{--                        <td class="m-5" style="padding-left: 30px;">{{$user->city}}</td>--}}
{{--                        <td class="m-5" style="padding-left: 30px;">{{$user->province}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
        </div>
        <table border="1">
            <tr>
                <th style="padding-right: 100px;">First Name</th>
                <th style="padding-right: 100px;">Last Name</th>
                <th style="padding-right: 100px;text-align: start;">email</th>
                <th style="padding-left: 30px;padding-right: 100px;">Phone</th>
                <th style="padding-right: 100px;">resident</th>
                <th style="padding-right: 100px;padding-left: 30px;">City</th>
                <th style="padding-right: 100px;padding-left: 30px;">Province</th>
            </tr>
            @foreach ($users as $user)
            <tr>

                <td class="m-5">{{$user->first_name}}</td>
                <td class="">{{$user->last_name}}</td>
                <td class="m-5" style="padding-left: 5px; ">{{$user->email}}</td>
                <td class="m-5" style="padding-left: 30px;">{{$user->phone_number}}</td>
                <td class="m-5" style="padding-left: 5px;">{{$user->resident}}</td>
                <td class="m-5" style="padding-left: 30px;">{{$user->city}}</td>
                <td class="m-5" style="padding-left: 30px;">{{$user->province}}</td>
            </tr>
            @endforeach
{{--            <tr>--}}
{{--                <td>Row 2, Cell 1</td>--}}
{{--                <td>Row 2, Cell 2</td>--}}
{{--                <td>Row 2, Cell 3</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>Row 3, Cell 1</td>--}}
{{--                <td>Row 3, Cell 2</td>--}}
{{--                <td>Row 3, Cell 3</td>--}}
{{--            </tr>--}}
        </table>
    </div>

</div>

</body>

<body>
<div class="container">

    <br>
</div>

</body>
</html>
