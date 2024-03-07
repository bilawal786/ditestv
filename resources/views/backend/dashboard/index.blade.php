@extends('layouts.app')

@section('content')
    <style>
        .small-box {
            border-radius: 10px;
            padding: 10px;
            color: white;
            margin-bottom: 10px;
        }
    </style>
    @php
        $countusers = \App\Models\User::Where('role',1)->count();
    @endphp
    <div id="main-content">

        <div class="container-fluid" style="margin-top: 10px;">
            <div class="row clearfix">
                <div class="col-12">
                    <div class="top_report">
                        <div class="row">
                            @if (auth()->user()->role == 0)
                                <div class="mt-2 mb-2 col-md-3 col-sm-6">
                                    <div class=" small-box bg-success">
                                        <div class="inner text-center pt-3">
                                            <h1 class="font-weight-bold"><i class="fa fa-user-plus"></i> {{$countusers}}</h1>
                                            <h5>Soci reistrati</h5>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-folder-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="mt-2 mb-2 col-md-3 col-sm-6">
                                <!-- small box -->
                                <div class=" small-box bg-danger">
                                    <div class="inner text-center pt-3">
                                        <h1 class="font-weight-bold"><i class="fa fa-warning"></i> {{$count}}</h1>
                                        <h5>Soci con scadenze</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-folder-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        <span class="bottom-right-text"></span>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
