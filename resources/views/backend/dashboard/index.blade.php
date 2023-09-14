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
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="icon-home"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-12">
                    <div class="top_report">
                        <div class="row">
                            {{--                            <div class="mt-2 mb-2 col-md-3 col-sm-6">--}}
                            {{--                                <!-- small box -->--}}
                            {{--                                <div class=" small-box bg-primary">--}}
                            {{--                                    <div class="inner text-center">--}}
                            {{--                                        <h1 class="font-weight-bold">0</h1>--}}
                            {{--                                        <p>Add Text Here</p>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="icon">--}}
                            {{--                                        <i class="fa fa-folder-plus"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="mt-2 mb-2 col-md-3 col-sm-6">--}}
                            {{--                                <!-- small box -->--}}
                            {{--                                <div class=" small-box bg-danger">--}}
                            {{--                                    <div class="inner text-center">--}}
                            {{--                                        <h1 class="font-weight-bold">0</h1>--}}
                            {{--                                        <p>Add Text Here</p>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="icon">--}}
                            {{--                                        <i class="fa fa-folder-plus"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="mt-2 mb-2 col-md-3 col-sm-6">--}}
                            {{--                                <!-- small box -->--}}
                            {{--                                <div class=" small-box bg-success">--}}
                            {{--                                    <div class="inner text-center">--}}
                            {{--                                        <h1 class="font-weight-bold">0</h1>--}}
                            {{--                                        <p>Add Text Here</p>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="icon">--}}
                            {{--                                        <i class="fa fa-folder-plus"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="mt-2 mb-2 col-md-3 col-sm-6">--}}
                            {{--                                <!-- small box -->--}}
                            {{--                                <div class=" small-box bg-warning">--}}
                            {{--                                    <div class="inner text-center">--}}
                            {{--                                        <h1 class="font-weight-bold">0</h1>--}}
                            {{--                                        <p>Add Text Here</p>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="icon">--}}
                            {{--                                        <i class="fa fa-folder-plus"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="mt-2 mb-2 col-md-3 col-sm-6">
                                <!-- small box -->
                                <div class=" small-box bg-info">
                                    <div class="inner text-center">
                                        <h1 class="font-weight-bold">0</h1>
                                        <p>Total Customers</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-folder-plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 mb-2 col-md-3 col-sm-6">
                                <!-- small box -->
                                <div class=" small-box bg-secondary">
                                    <div class="inner text-center">
                                        <h1 class="font-weight-bold">0</h1>
                                        <p>Expired</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-folder-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt-2 mb-2 col-md-2 col-sm-6">
                    <!-- small box -->
                    <a href="{{route('sendEmail')}}" class="bg-primary text-white p-3">Release Test Deadline</a>
                </div>

                <div class="mt-2 mb-2 col-md-2 col-sm-6">
                    <!-- small box -->
                    <a href="{{route('minimum_activity')}}" class="bg-primary text-white p-3">Minimum Activity</a>
                </div>

                <div class="mt-2 mb-2 col-md-2 col-sm-6">
                    <!-- small box -->
                    <a href="{{route('insurance_expire')}}" class="bg-primary text-white p-3">Insurance Expire</a>
                </div>

                <div class="mt-2 mb-2 col-md-2 col-sm-6">
                    <a href="{{route('medical_dealine')}}" class="bg-primary text-white p-3">Medical Dealine</a>
                </div>

                <div class="mt-2 mb-2 col-md-2 col-sm-6">
                    <!-- small box -->
                    <a href="{{route('expiry_date')}}" class="bg-primary text-white p-3">Expiry Date</a>

                </div>
            </div>
        </div>
    </div>

@endsection
